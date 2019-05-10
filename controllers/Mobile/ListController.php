<?php

/**
 * Class ModuleSkeleton_Mobile_ListController
 */
class ModuleSkeleton_Mobile_ListController extends Application_Controller_Mobile_Default
{
    /**
     *
     */
    public function loadContentAction()
    {
        try {
            $optionValue = $this->getCurrentOptionValue();
            $valueId = $optionValue->getId();

            $skeleton = (new ModuleSkeleton_Model_Skeleton())->find($valueId, "value_id");

            $fakeCollection = [];
            for ($i = 1; $i < 10; $i++) {
                $fakeCollection[] = [
                    "title" => "Item title #{$i}",
                    "subtitle" => "Subtitle description content message more #{$i}",
                ];
            }

            $payload = [
                "success" => true,
                "pageTitle" => (string)$optionValue->getTabbarName(),
                "title" => (string)$skeleton->getTitle(),
                "subtitle" => (string)$skeleton->getSubtitle(),
                "collection" => $fakeCollection,
            ];

        } catch (Exception $e) {
            $payload = [
                "error" => true,
                "message" => $e->getMessage()
            ];
        }

        $this->_sendJson($payload);
    }
}
