<?php

/**
 * Class ModuleSkeleton_ApplicationController
 */
class ModuleSkeleton_ApplicationController extends Application_Controller_Default
{
    /**
     * Edit the default skeleton settings
     */
    public function saveAction()
    {
        try {
            $request = $this->getRequest();
            $params = $request->getPost();

            $form = new ModuleSkeleton_Form_Skeleton();

            if ($form->isValid($params)) {
                
                // Do whatever you need when form is valid!
                $optionValue = $this->getCurrentOptionValue();
                $valueId = $optionValue->getId();
                $skeleton = (new ModuleSkeleton_Model_Skeleton())
                    ->find($valueId, "value_id");
                
                $skeleton->setData($params);
                $skeleton->save();

                /** Update touch date, then never expires (until next touch) */
                $this->getCurrentOptionValue()
                    ->touch()
                    ->expires(-1);

                $payload = [
                    "success" => true,
                    "message" => __("Success."),
                ];
            } else {
                $payload = [
                    "error" => true,
                    "message" => $form->getTextErrors(),
                    "errors" => $form->getTextErrors(true)
                ];
            }
        } catch (Exception $e) {
            $payload = [
                "error" => true,
                "message" => $e->getMessage(),
            ];
        }

        $this->_sendJson($payload);
    }
}
