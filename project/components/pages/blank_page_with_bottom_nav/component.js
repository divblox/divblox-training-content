if (typeof component_classes['pages_blank_page_with_bottom_nav'] === "undefined") {
	class pages_blank_page_with_bottom_nav extends DivbloxDomBaseComponent {
		constructor(inputs,supports_native,requires_native) {
			super(inputs,supports_native,requires_native);
			// Sub component config start
			this.sub_component_definitions = [{"component_load_path":"navigation/bottom_navbar","parent_element":"8kYvw","arguments":{}}];
			// Sub component config end
		}
		reset(inputs) {
			setActivePage("page_component_name","Page Title");
			super.reset(inputs);
		}
	}
	component_classes['pages_blank_page_with_bottom_nav'] = pages_blank_page_with_bottom_nav;
}