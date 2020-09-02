<?php
require("../../../../divblox/divblox.php");
class TicketController extends EntityInstanceComponentController {
    protected $EntityNameStr = "Ticket";
    protected $IncludedAttributeArray = ["TicketName","TicketDescription","TicketDueDate","TicketStatus","TicketUniqueId",];
    protected $IncludedRelationshipArray = ["Category" => "CategoryLabel",];
    protected $ConstrainByArray = [];
    protected $RequiredAttributeArray = [];
    protected $NumberValidationAttributeArray = [];

    public function __construct($ComponentNameStr = 'Component') {
        parent::__construct($ComponentNameStr);
    }

    public function getNewTicketUniqueId() {
        // setResult() to either true or false calling the success or failure
        // function in the front end.
        $this->setResult(true);

        // setReturnValue() sets the values in an array that will be returned as JSON
        // when the script completes. It is always a good idea to populate a
        // "Message" for the front-end
        $this->setReturnValue("Message", "New unique ID created");
        // Here we set the value of any additional parameters to return
        $this->setReturnValue("TicketId", ProjectFunctions::getNewTicketUniqueId());

        // "presentOutput()" returns our array as JSON and stops any
        // further execution of the current php script
        $this->presentOutput();
    }
}
$ComponentObj = new TicketController("ticket_crud_create");
?>