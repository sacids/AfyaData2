/**
 * Created by Godluck on 12-Apr-17.
 */

//Questions holder div id formQuestions
//Draggable Question href class qnType
//
//Droppable  area id formQuestionsBuilder


$(document).ready(function () {

    var baseUrl = "http://localhost/afyadata2/index.php/";
    $('a.qnType, .inputField').draggable({
        helper: 'clone'
    });

    $('#formQuestionsBuilder, .formbuilder .formGroup').droppable({
        drop: function (event, ui) {

            InputFieldType = {
                TEXT: 'text',
                TEXTAREA: 'textarea',
                NUMERIC: 'numeric',
                PHONE: 'phone',
                DROPDOWN: 'dropdown',
                RADIO: 'radio',
                CHECKBOX: 'checkbox',
                LOCATION: 'location',
                PHOTO: 'photo',
                DATE: 'date',
                TIME: 'time',
                BARCODE: 'barcode',
                GROUP: 'group',
            }

            var droppableArea = $(this).attr('id');

            console.log('droppable area id ==> ' + droppableArea);

            var inputType = $(ui.draggable).attr('id');

            console.log('input type  ==> ' + inputType);

            var inputField = null;
            var formJson = '';

            switch (inputType) {
                case InputFieldType.TEXT:
                    inputField = '<input type="text"  id="' + inputType + '" class="inputField form-control" placeholder="Text"/><br/>';
                    break;
                case InputFieldType.NUMERIC:
                    inputField = '<input type="number"  id="' + inputType + '"  class="inputField form-control" placeholder="Numeric"/><br/>';
                    break;
                case InputFieldType.PHONE:
                    inputField = '<input type="number"  id="' + inputType + '"   class="inputField form-control" placeholder="Phone"/><br/>';
                    break;
                case InputFieldType.TEXTAREA:
                    inputField = '<textarea id="' + inputType + '"  class="inputField form-control" placeholder="TextArea"></textarea><br/>';
                    break;
                case InputFieldType.DROPDOWN:

                    break;
                case InputFieldType.RADIO:

                    break;
                case InputFieldType.CHECKBOX:

                    break;
                case InputFieldType.LOCATION:
                    inputField = '<div  id="' + inputType + '"   class="inputField alert alert-success"><i class="fa fa-map-marker"></i> Location</div>';
                    break;
                case InputFieldType.PHOTO:
                    inputField = '<div  id="' + inputType + '"   class="inputField alert alert-success"><i class="fa fa-camera"></i> Photo</div>';
                    break;
                    break;
                case InputFieldType.DATE:
                    inputField = '<input type="date"  id="' + inputType + '"   class="inputField form-control" placeholder="Date"/><br/>';
                    break;
                case InputFieldType.TIME:
                    inputField = '<input type="time"  id="' + inputType + '"   class="inputField form-control" placeholder="Time"/><br/>';
                    break;
                case InputFieldType.GROUP:
                    inputField = '<div  id="' + inputType + '"   class="inputField formGroup alert alert-success"><i class="fa fa-align-justify"></i> Group</div>';
                    break;
                case InputFieldType.BARCODE:
                    inputField = '<div  id="' + inputType + '"   class="inputField formGroup alert alert-success"><i class="fa fa-barcode"></i> Barcode</div>';
                    break;
            }
            console.log("added input of type " + inputType);

            var qnBuilder = $(this).attr('id');
            var json = "{json data}";

            $.ajax({
                url: baseUrl + 'FormBuilder/save',
                type: 'GET',
                data: {
                    'input': inputType,
                    'json': json
                },
                'success': function (data) {
                    // Check if json was saved to database
                    if (inputField != null) {
                        $('#' + droppableArea).append(inputField);
                    }
                }
            });
        }
    });
});