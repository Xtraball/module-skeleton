<?php

/**
 * Class ModuleSkeleton_Form_Skeleton
 */
class ModuleSkeleton_Form_Skeleton extends Siberian_Form_Abstract
{
    /**
     * @throws Zend_Form_Exception
     */
    public function init()
    {
        parent::init();

        $this
            ->setAction(__path("/moduleskeleton/application/save"))
            ->setAttrib("id", "form-skeleton");

        self::addClass("create", $this);

        $this->addSimpleText("title", __("Title"));
        $this->addSimpleText("subtitle", __("Subtitle"));

        $this->addSimpleHidden("value_id");

        $this->addSubmit(__("Save"))
            ->addClass("default_button")
            ->addClass("pull-right")
            ->addClass("submit_button");
    }
}