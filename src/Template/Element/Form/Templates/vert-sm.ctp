<?php

$myTemplates = [
    'errorClass' => 'is-invalid',
    'error' => '<div class="invalid-feedback">{{content}}</div>',
    'inputContainerError' => '<div class="form-group {{required}} is-invalid">{{content}}</div>',

    'inputContainer' => '<div class="form-group">{{content}}</div>',
    'formGroup' => '{{label}}<div class="col-sm-8">{{input}}</div>',
    'label' => '<label{{attrs}} class="col-sm-4">{{text}}</label>',
    'input' => '<input type="{{type}}" name="{{name}}" class="form-control form-control-sm" {{attrs}} >',
    'select' => '<select name="{{name}}" class="form-control form-control-sm" {{attrs}}>{{content}}</select>',
    'selectMultiple' => '<select name="{{name}}[]" class="form-control form-control-sm" multiple="multiple"{{attrs}}>{{content}}</select>',
    'textarea' => '<textarea name="{{name}}" class="form-control form-control-sm" {{attrs}}>{{value}}</textarea>',
    'file' => '<input type="file" class="btn btn-light" name="{{name}}"{{attrs}}>',
    'radio' => '<input type="radio" class="form-check-input" name="{{name}}" value="{{value}}"{{attrs}}>',
    'radioWrapper' => '<div class="form-check">{{label}}</div>',

    'checkboxFormGroup' => '<div class="offset-sm-4">{{label}}</div>',
    'checkbox' => '<input type="checkbox" class="form-check-input" name="{{name}}" value="{{value}}"{{attrs}}>',
    'checkboxWrapper' => '<div class="form-check">{{label}}</div>',

    'inputSubmit' => '<input type="{{type}}" class="btn btn-primary" {{attrs}}/>',
    'button' => '<button class="btn btn-primary" {{attrs}}>{{text}}</button>',
];

$this->Form->setTemplates($myTemplates);

?>