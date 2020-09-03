if (typeof component_classes['data_model_ticket_crud_create'] === "undefined") {
	class data_model_ticket_crud_create extends DivbloxDomEntityInstanceComponent {
		constructor(inputs,supports_native,requires_native) {
			super(inputs,supports_native,requires_native);
			// Sub component config start
			this.sub_component_definitions = [];
			// Sub component config end
			this.included_attribute_array = ['TicketName','TicketDescription','TicketDueDate','TicketStatus','TicketUniqueId',];
			this.included_relationship_array = ['Category',];
			this.constrain_by_array = [];
			this.data_validation_array = [];
			this.custom_validation_array = [];
			this.required_validation_array = ['TicketName','TicketDescription','TicketDueDate','TicketStatus','TicketUniqueId','Category',];
			this.initCrudVariables("Ticket");
		}
	    initCustomFunctions() {
            // Kzd7U_button Related functionality
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            getComponentElementById(this,"Kzd7U_btn").on("click", function() {
				dxRequestInternal(
					getComponentControllerPath(this),
					// Tell component.php which function to execute
					{ f: "getNewTicketUniqueId" },
					function (data_obj) {
						// Success function
						getComponentElementById(this, "TicketUniqueId").val(data_obj.TicketId);
					}.bind(this),
					function (data_obj) {
						// Fail function
					}.bind(this)
				);
            }.bind(this));
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        }
   	}
	component_classes['data_model_ticket_crud_create'] = data_model_ticket_crud_create;
}