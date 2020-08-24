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
let native_config = {
	init_complete:false,
	push_notifications_enabled:true,
	push_notifications_permissions_requested:false,
	push_notification_firebase_sender_id:'XXXXXXXXXX',
	cordova_plugin_push_instance:null
};
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Safe to modify from here downwards
let user_role_landing_pages = {
	"anonymous":"anonymous_landing_page",
	"Administator":"system_account_management",
	//"User":"the_desired_landing_page"
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
		{},
		function(data_obj) {
			if (data_obj.LogoutResult === true) {
				loadUserRoleLandingPage("anonymous");
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
	if (typeof user_role_landing_pages[user_role] === "undefined") {
		loadPageComponent('my_profile');
		return;
	}
	loadPageComponent(user_role_landing_pages[user_role]);
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
		{attribute:attribute},
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
 * Creates a push registration on the server for the current device
 * @param {String} registration_id The given registration Id as received from the push service
 * @param {Function} success_callback Function that will receive the internal push id that is stored on the server
 * @param failure_callback Function that will receive a failure message
 */
function createPushRegistration(registration_id,success_callback,failure_callback) {
	if (typeof success_callback !== "function") {
		success_callback = function() {};
	}
	if (typeof failure_callback !== "function") {
		failure_callback = function() {};
	}
	if (typeof registration_id === "undefined") {
		failure_callback("No registration id provided");
		return;
	}
	let device_uuid = 'browser';
	let device_platform = 'browser';
	let device_os = 'browser';
	if (isNative()) {
		device_uuid = device.uuid;
		device_platform = device.platform;
		device_os = device.version;
	}
	setItemInLocalStorage("PushRegistrationId",registration_id);
	dxRequestInternal(getServerRootPath()+'api/global_functions/updatePushRegistration',
		{registration_id: registration_id,
			device_uuid: device_uuid,
			device_platform: device_platform,
			device_os:device_os,
		},
		function(data_obj) {
			success_callback(data_obj.InternalId);
		},
		function(data_obj) {
			failure_callback(data_obj.Message);
		});
}
/**
 * @todo Any actions that should happen once the document is ready and all dx dependencies have been loaded can be placed
 * here.
 */
function doAfterInitActions() {
	if (!isNative()) {return;}
	if (!native_config.init_complete) {
		//JGL: Do all inits for native first load here...
		initPushNotifications();
		requestPushNotificationPermissions(); //JGL: Comment this out if you want to implement it somewhere other
		// than the after init functions section. See requestPushNotificationPermissions() function doc
		native_config.init_complete = true;
	}
	
}
/**
 * This function is used to trigger the first request for push notification permissions. Call this function on a page
 * that is dedicated to explaining to the user why we want to send push notifications.
 * you can also simply call this from doAfterInitActions() if you don't plan on providing additional
 * information to the user.
 */
function requestPushNotificationPermissions() {
	if (!isNative()) {return;}
	if (native_config.push_notifications_permissions_requested) {return;}
	native_config.push_notifications_permissions_requested = true;
	initPushNotifications();
}
/**
 * This function is used to register the event handlers for push notifications once we have permission. Call this
 * function after requestPushNotificationPermissions();
 */
function initPushNotifications() {
	if (!isNative()) {return;}
	if (!native_config.push_notifications_enabled) {return;}
	if (!native_config.push_notifications_permissions_requested) {return;}
	native_config.cordova_plugin_push_instance = PushNotification.init({
		android: {
			"senderID": native_config.push_notification_firebase_sender_id
		},
		/*browser: {
            pushServiceURL: 'http://push.api.phonegap.com/v1/push'
        },*/
		ios: {
			alert: 'true',
			badge: true,
			sound: 'true'
		}/*,
    windows: {}*/
	});
	native_config.cordova_plugin_push_instance.on('registration', (data) => {
		// data.registrationId
		//showAlert("Push registered...: "+data.registrationId,"info","OK",false);
		createPushRegistration(data.registrationId,
			function() {
				//console.log("Push registration created");
			},
			function() {
				//console.log("Push registration NOT created")
			});
	});
	native_config.cordova_plugin_push_instance.on('notification', (data) => {
		// data.message,
		// data.title,
		// data.count,
		// data.sound,
		// data.image,
		// data.additionalData
		handleReceivePushNotification(data);
	});
	native_config.cordova_plugin_push_instance.on('error', (e) => {
		// e.message
		console.log("Push error: "+e.message);
	});
}
/**
 * Can be used to set the badge number on the app icon for native apps
 * @param number
 */
function setApplicationIconBadgeNumber(number) {
	if (native_config.cordova_plugin_push_instance != null) {
		native_config.cordova_plugin_push_instance.setApplicationIconBadgeNumber(
			() => {
				//console.log('setApplicationIconBadgeNumber success');
			},
			() => {
				//console.log('setApplicationIconBadgeNumber error');
			},
			number
		);
	}
}
/**
 * Can be used to get the current badge number on the app icon for native apps
 * @param callback
 */
function getApplicationIconBadgeNumber(callback) {
	if (native_config.cordova_plugin_push_instance != null) {
		native_config.cordova_plugin_push_instance.getApplicationIconBadgeNumber(
			n => {
				//console.log('getApplicationIconBadgeNumber success', n);
				callback(n);
			},
			() => {
				//console.log('getApplicationIconBadgeNumber error');
				callback(-1);
			}
		);
	}
}
/**
 * @todo Any actions that should happen after authentication should be placed here
 */
function doAfterAuthenticationActions() {
}