<?php
/**
 * Created by PhpStorm.
 * User: Godluck Akyoo
 * Date: 12-Apr-17
 * Time: 16:29
 */
?>

<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <h2 class="">Form Builder</h2>
            <?= get_flashdata() ?>
        </div>
    </div>
    <div class="row">
        <div class="">
            <div class="col-md-3 col-lg-3">
                <h4>Input/Question Types</h4>
                <div class="formbuilder" id="formInputs" style="overflow-y: scroll; max-height:450px;">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="" id="inputText"><i class="fa fa-text-width fa-2x"></i> Text</a></li>
                        <li class="list-group-item">
                            <a href="" id="inputText"><i class="fa fa-hashtag fa-2x"></i> Numeric</a></li>
                        <li class="list-group-item">
                            <a href="" id="inputPhone"><i class="fa fa-phone fa-2x"></i> Phone</a></li>
                        <li class="list-group-item">
                            <a href="" id="inputDate"><i class="fa fa-calendar fa-2x"></i> Date</a></li>
                        <li class="list-group-item">
                            <a href="" id="inputTime"><i class="fa fa-clock-o fa-2x"></i> Time</a></li>
                        <li class="list-group-item">
                            <a href="" id="inputDropdown"><i class="fa fa-caret-square-o-down fa-2x"></i> Dropdown</a>
                        </li>
                        <li class="list-group-item">
                            <a href="" id="inputRadio"><i class="fa fa-dot-circle-o fa-2x"></i> Radion</a></li>
                        <li class="list-group-item">
                            <a href="" id="inputCheckbox"><i class="fa fa-check-circle-o fa-2x"></i> Checkbox</a></li>
                        <li class="list-group-item">
                            <a href="" id="inputLocation"><i class="fa fa-map-marker fa-2x"></i> Location</a></li>
                        <li class="list-group-item">
                            <a href="" id="inputPhoto"><i class="fa fa-camera fa-2x"></i> Photo</a></li>
                        <li class="list-group-item">
                            <a href="" id="inputBarcode"><i class="fa fa-barcode fa-2x"></i> Barcode</a></li>
                        <li class="list-group-item">
                            <a href="" id="inputGroup"><i class="fa fa-align-justify fa-2x "></i> Group</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <h4>Form name here</h4>
                <div id="formBuilder" class="formbuilder">
                    <div class="alert alert-info">
                        Drag and drop question types from the question type list
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-lg-3">
                <h4>Form Element Editor</h4>
                <div class="formbuilder" id="formElementsEditor">
                    <p class="alert alert-info">No input is currently selected</p>
                </div>
            </div>
        </div>
    </div>
</div>