// This file allows you to create your own global javascript functionality.
// Functions declared here can be used to override default divblox behaviour
// The first section of this file is reserved for divblox code generation. Do not modify these lines manually
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
let local_config = {
	spa_mode:false,
	service_worker_enabled:false,
	debug_mode:true,
	allow_feedback:true,
	app_name:'divblox'
};
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Safe to modify from here downwards
// Ensure that user roles are lower case
let user_role_landing_pages = {
	"anonymous":"anonymous_landing_page",
	"administrator":"system_account_management",
	"user":"my_profile"
};
let current_user_profile_picture_path = getRootPath()+"project/assets/images/divblox_profile_picture_placeholder.svg";
/**
 * The function that registers the divblox service worker in the browser
 */
function registerServiceWorker() {
	if ('serviceWorker' in navigator) {
		navigator.serviceWorker.register(getRootPath()+'dx.sw.js').then(reg => {
			reg.addEventListener('updatefound', () => {
				// A wild service worker has appeared in reg.installing!
				service_worker_update = reg.installing;
				service_worker_update.addEventListener('statechange', () => {
					// Has network.state changed?
					switch (service_worker_update.state) {
						case 'installed':
							if (navigator.serviceWorker.controller) {
								// new update available
								showAppUpdateBar();
							}
							// No update available
							break;
					}
				});
			});
		});
	} else {
		dxLog("Service worker not available");
	}
}
/**
 * Returns the path to the App's main logo
 * @return {string} The path to the logo file
 */
function getAppLogoUrl() {
	return getRootPath()+'project/assets/images/app_logo.png';
}
/**
 * Provides the message that the system presents when a request is kicked off while offline and the request is to be
 * queued
 * @return {string} The message to be presented
 */
function presentOfflineRequestQueuedMessage() {
	return "You are offline. Your request has been queued and will be processed as soon as you are connected again.";
}
/**
 * Provides the message that the system presents when a request is kicked off while offline and the request is NOT to be
 * queued
 * @return {string} The message to be presented
 */
function presentOfflineRequestBlockedMessage() {
	return "This request cannot be processed at this time because you are offline.";
}
/**
 * Logs out the current user by calling api/global_functions/logoutCurrentAccount to clear the current session and
 * authentication token credentials
 */
function logout() {
	current_user_profile_picture_path = "";
    registerUserRole("anonymous");
	dxRequestInternal(getServerRootPath()+"api/global_functions/logoutCurrentAccount",
		{AuthenticationToken:getAuthenticationToken()},
		function(data_obj) {
			if (data_obj.LogoutResult === true) {
				if (!isNative()) {
					loadUserRoleLandingPage("anonymous");
				} else {
					loadUserRoleLandingPage("native_landing");
				}
			} else {
				throw new Error("Could not logout user: "+JSON.stringify(data_obj));
			}
		},
		function(data_obj) {
			throw new Error("Could not logout user: "+JSON.stringify(data_obj));
		})
}
/**
 * Loads the page that is defined in user_role_landing_pages for the provided role
 * @param {String} user_role The role to load a page for
 */
function loadUserRoleLandingPage(user_role) {
	if (typeof user_role === "undefined") {
		loadPageComponent('my_profile');
		return;
	}
	let user_role_prepared = user_role.toLowerCase();
	if (typeof user_role_landing_pages[user_role_prepared] === "undefined") {
		loadPageComponent('my_profile');
		return;
	}
	if (user_role_prepared === 'anonymous') {
		if (!isNative()) {
			loadPageComponent(user_role_landing_pages[user_role_prepared]);
		} else {
			loadPageComponent('native_landing');
		}
		return;
	}
	loadPageComponent(user_role_landing_pages[user_role_prepared]);
}
/**
 * Updates the system-wide profile picture class "navigation-activate-on-profile" with the current user's profile
 * picture by calling the server to get the picture file path
 * @param {Function} callback A function that is called with the file path when done
 */
function loadCurrentUserProfilePicture(callback) {
	getCurrentUserAttribute('ProfilePicturePath',function(profile_picture_path) {
		if (typeof profile_picture_path === "undefined") {
			$(".navigation-activate-on-profile").html('<img src="'+current_user_profile_picture_path+'" class="img rounded-circle nav-profile-picture"/>');
			return;
		}
		if (typeof profile_picture_path === null) {
			$(".navigation-activate-on-profile").html('<img src="'+current_user_profile_picture_path+'" class="img rounded-circle nav-profile-picture"/>');
			return;
		}
		current_user_profile_picture_path = profile_picture_path;
		$(".navigation-activate-on-profile").html('<img src="'+profile_picture_path+'" class="img rounded-circle nav-profile-picture"/>');
		if (typeof callback === "function") {
			callback(profile_picture_path);
		}
	});
}
/**
 * Queries the server for an attribute that describes the current logged in user
 * @param {String} attribute The attribute to find
 * @param {Function} callback The function that is populated with the value for the given attribute once returned
 * from the server
 */
function getCurrentUserAttribute(attribute,callback) {
	let attribute_to_return = undefined;
	if (attribute === "ProfilePicturePath") {
		attribute_to_return = getRootPath()+"project/assets/images/divblox_profile_picture_placeholder.svg";
	}
	dxRequestInternal(getServerRootPath()+'api/global_functions/getCurrentAccountAttribute',
		{attribute:attribute,AuthenticationToken:getAuthenticationToken()},
		function(data_obj) {
			if (typeof data_obj.Result === "undefined") {
				callback(attribute_to_return);
				return;
			}
			if (data_obj.Result !== 'Success') {
				callback(attribute_to_return);
				return;
			}
			if (attribute === "ProfilePicturePath") {
				if (data_obj.Attribute === null) {
					callback(attribute_to_return);
					return;
				}
				callback(getServerRootPath()+data_obj.Attribute);
			} else {
				callback(data_obj.Attribute);
			}
		},
		function(data) {
			callback(attribute_to_return);
		},true);
}
/**
 * @todo Any actions that should happen once the document is ready and all dx dependencies have been loaded can be placed
 * here.
 */
function doAfterInitActions() {
	//TODO: Override this as needed
}
/**
 * @todo Any actions that should happen after authentication should be placed here
 */
function doAfterAuthenticationActions() {
	//TODO: Override this as needed
}