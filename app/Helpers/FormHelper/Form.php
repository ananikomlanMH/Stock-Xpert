<?php

namespace App\Helpers\FormHelper;

class Form
{
    private string $Form = "";
    private string $tile_check_box = "";


    /**
     * @param string $text
     * @return string
     */
    public function getText(string $text): string
    {
        $this->Form .= $text;
        return $text;
    }

    /**
     * @param string $type
     * @param string|null $is
     * @param string $name
     * @param string $label
     * @param string|null $placeholder
     * @param string|null $value
     * @param string|null $control
     * @param int $maxlenght
     * @param string|null $attributes
     * @param string|null $class
     * @return string
     */
    public function getInput(string $type, ?string $is, string $name, string $label, ?string $placeholder = " ", ?string $value = null, ?string $control = null, int $maxlenght = 100, ?string $attributes = null, ?string $class = null): string
    {
        if ($type == "hidden") {
            $result = <<<FORM
            <input type="hidden" name="{$name}" value="{$value}">
FORM;
            $this->Form .= $result;
            return $result;

        }
        if ($placeholder == null) {
            $placeholder = " ";
        }

        $result = <<<FORM
                    <div class="field {$class}">
                        <div class="input-area">
                            <input autocomplete="off" type="{$type}" data-control="{$control}" maxlength="{$maxlenght}" is="{$is}"
                                   placeholder="{$placeholder}" value="{$value}" id="{$name}" name="{$name}" {$attributes}>
                            <label for="{$name}">{$label}</label>
                            <i class="error error-icon fi-rr-exclamation" title="champ obligatoire"></i>
                        </div>
                        <div class="error error-txt">Veuillez renseigner cet champ</div>
                    </div>
FORM;
        $this->Form .= $result;
        return $result;
    }

    /**
     * @param string $name
     * @param string $label
     * @param string|null $title
     * @param null $checked
     * @return string
     */
    public function getInputCheckBox(string $name, string $label, ?string $title = null, $checked = null, ?string $class = null, ?string $value = null, ?string $icon = "fi-rr-shield-check"): string
    {
        $check = "";
        if ($checked == "1" || $checked == true) {
            $check = 'checked';
        }

        $result = <<<FORM
        <div class="checkbox {$class}">
            <input type="checkbox" value="{$value}" title="{$title}" name="{$name}" id="{$name}" {$check}>
            <div class="box">
                <i class="{$icon}"></i>
                <p data-text="{$label}">{$label}</p>
            </div>
        </div>
FORM;

        $this->tile_check_box .= $result;
        return $result;
    }

    /**
     * @param string $name
     * @param string $label
     * @param string|null $placeholder
     * @param string|null $value
     * @param string|null $control
     * @return string
     */
    public function getTextArea(string $name, string $label, ?string $placeholder = " ", ?string $value = null, ?string $control = null, ?string $is = null): string
    {
        if ($placeholder == null) {
            $placeholder = " ";
        }

        $labelForm = "";
        if ($is == null) {
            $labelForm = <<<FORM
<label for="{$name}">{$label}</label>
FORM;

        }

        $result = <<<FORM
                    <div class="field">
                        <div class="input-area">
                           <textarea style="height: 250px;" autocomplete="off" is="{$is}" name="{$name}" id="{$name}" placeholder="{$placeholder}" data-control="{$control}">{$value}</textarea>
                            $labelForm
                            <i class="error error-icon fi-rr-exclamation" title="champ obligatoire"></i>
                        </div>
                        <div class="error error-txt">Veuillez renseigner cet champ</div>
                    </div>
FORM;

        $this->Form .= $result;
        return $result;
    }

    /**
     * @param string|null $is
     * @param string $name
     * @param string $label
     * @param null $value
     * @param string|null $control
     * @param array $data
     * @param string|null $attributes
     * @param string|null $class
     * @return string
     */
    public function getSelectInput(?string $is, string $name, string $label, $value = null, ?string $control = null, $data = [], ?string $attributes = null, ?string $class = null): string
    {

        $text = "";
        $text = <<<FORM
                    <div class="field {$class}">
                        <div class="input-area">
                            <select name="{$name}" id="{$name}" data-control="{$control}" {$attributes}
                                        is="{$is}" placeholder=" ">
                                    <option data-placeholder="true">{$label}</option>
FORM;
        foreach ($data as $key => $item) {
            $item = (object)$item;
            $check = trim($value ?: "") == ($item->id ?? $item->scalar) ? "Selected" : "";
            $attr = $item->attr ?? '';
            $text .= "<option $attr value='" . ($item->id ?? $item->scalar) . "' " . $check . ">" . ($item->libelle ?? $item->scalar) . "</option>";
        }
        $text .= <<<FORM
                                </select>
                                <label for="{$name}">{$label}</label>
                            <i class="error error-icon fi-rr-exclamation" title="champ obligatoire"></i>
                        </div>
                        <div class="error error-txt">Veuillez renseigner cet champ</div>
                    </div>
FORM;

        $this->Form .= $text;
        return $text;
    }


    /**
     * @param string $name
     * @param string $label
     * @param string|null $value
     * @return string
     */
    public function getInputFileDoc(string $name, string $label, ?string $value = null): string
    {
        $deleteText = "";
        $formAdd = "";


        if ($value !== null) {
            $deleteText = 'onclick="app.removeLogo(this);" style="display: block;"';
            $formAdd = '<input type="hidden" name="removeLogo" id="removeLogo" value="' . $value . '">';
        }
        $result = <<<FORM
                <div class="field">
                    <div class="input-area">
                        <input id="upload-image" placeholder=" " accept=".pdf" type="file" name="{$name}">
                        <label for="logo">{$label}</label>
                        <a href="" id="deleteUploadImage" {$deleteText}>Retirer</a>
                        <img src="/vendors/images/dev_img/svg/PDF_file_icon.svg" alt="" id="upload-image-preview" class="previewImg">
                        {$formAdd}
                    </div>
                </div>
FORM;
        $this->Form .= $result;
        return $result;
    }


    /**
     * @param string $name
     * @param string $label
     * @param bool $preview
     * @param string|null $accept
     * @param string|null $defaultImgPlaceholder
     * @param string|null $imgValue
     * @return string
     */
    public function getInputFile(string $name, string $label, bool $preview = true, ?string $accept = "image/png, image/jpeg, image/jpg", ?string $defaultImgPlaceholder = null, ?string $imgValue = null): string
    {
        $logo = '/vendors/images/logo.svg';
        if ($accept == null) {
            $accept = "image/png, image/jpeg, image/jpg";
        }

        if ($defaultImgPlaceholder == null) {
            $defaultImgPlaceholder = $logo;
        }

        if ($imgValue == null) {
            $imgValue = $logo;
        }

        $styleDeleteUploadPreview = "";
        $add = "";
        if ($imgValue != $logo) {
            $styleDeleteUploadPreview = "style=display:block;";
            $add = <<<ADD
            <input type="hidden" name="remove_{$name}" id="remove_{$name}" value="{$imgValue}">
        ADD;
        }

        $previewImg = "";
        if ($preview) {
            $previewImg = <<<IMG
                <img data-img="{$defaultImgPlaceholder}" src="{$imgValue}" alt="" id="load__previewImg_{$name}" class="previewImg">
IMG;
        }

        $result = <<<FORM
            <div class="field">
                        <div class="input-area">
                            <input id="upload_image_{$name}" class="JS_load__previewImg" placeholder=" " accept="{$accept}" type="file"
                                   name="{$name}">
                            <label for="{$name}">{$label}</label>
                            <a href="" class="deleteUploadPreview" {$styleDeleteUploadPreview}>Retirer</a>
                            {$previewImg}
                            {$add}
                        </div>
                    </div>
FORM;

        $this->Form .= $result;
        return $result;

    }

    public function render(): string
    {
        $add = '';
        if(!empty($this->tile_check_box)){
            $add .= <<<FORM
<div class="tile_check_box ">$this->tile_check_box</div>

FORM;

        }
        return $this->Form.$add ;
    }
}
