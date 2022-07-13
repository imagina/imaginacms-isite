# imaginacms-isite

## Components

#### Edit Button

The main function of the edit button component is to generate a redirection only for the Page administrators, the component fulfills the function of showing buttons to edit content of the web page from the administrator of the web page, generating support for the administrators when they want to change the content of the page.

The edit button component has required parameters and optional parameters to meet the needs of the clients, the parameters of this component are the following:

* link (Required) = In this parameter the editing path of the page administrator is assigned from the domain.

  <- link="/iadmin/#/site/settings?settings=logo1&module=isite" ->
  
* tooltip (Optional) = In this parameter a help text is assigned to identify what function the component fulfills, by default the parameter has the phrase "Edit".

  <- tooltip="Edit Slider" ->
  
* classes (Optional) = In this parameter are the classes that are needed for the styles or column options among others of the button, by default the parameter has the class "editLink position-absolute" which cannot be modified, but the parameter allows adding more classes depending on the need.

  <- classes="py-5 edit-button-menu" ->

* top (Optional) = In this parameter the location is assigned on a vertical basis to give a positioning option, by default the parameter has a value of "15%".

  <- top="35%" ->

* bottom (Optional) = In this parameter the location is assigned in vertical base to give a positioning option, by default the parameter has an "unset" value.

  <- bottom="35%" ->

* right (Optional) = In this parameter the location in horizontal base is assigned to give a positioning option, by default the parameter has an "unset" value.

  <- right="35%" ->

* left (Optional) = In this parameter the location in horizontal base is assigned to give a positioning option, by default the parameter has a value of "15%".

  <- left="35%" ->

* idButton (Optional) = An identifier is assigned in this parameter for the later assignment of styles or any script that is needed, by default the parameter has a "Null" value.

  <- idButton="editSlider" ->
  
**Applications**

Currently, the edit button is implemented automatically in most components such as sliders among others, since they can be generated automatically, on the other hand, at the moment to generate an edit button of a setting of any module, the following command line must be fulfilled, which will call the edit button and will take us to edit the setting that we need.

    <- <x-isite::edit-link link="/iadmin/#/site/settings?settings={{setting_name}}&module={{module_name}}"/> ->

The previous line shows the route that the link parameter must take to make the edit button to any setting, and finally there is an example of the command line to make an edit button of any setting with all the parameters already named above

    <- <x-isite::edit-link link="/iadmin/#/site/settings?settings=settingTest&module=icustom" tooltip="Edit Setting settingTest" classes="py-5 edit-button-settingName" top="35%" bottom="15%" right="85%" left="45%" idButton="editSettingTest" /> ->

Remember that optional parameters do not generate errors if they are not sent, otherwise the required parameters can generate an error when assigning them.  

  
