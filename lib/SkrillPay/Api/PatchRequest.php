<?php

namespace SkrillPay\Api;

use SkrillPay\Common\SkrillPayModel;

/**
 * Class PatchRequest
 *
 * A JSON patch request.
 *
 * @package SkrillPay\Api
 *
 * @property \SkrillPay\Api\Patch[] patches
 */
class PatchRequest extends SkrillPayModel
{
    /**
     * Placeholder for holding array of patch objects
     *
     * @param \SkrillPay\Api\Patch[] $patches
     * 
     * @return $this
     */
    public function setPatches($patches)
    {
        $this->patches = $patches;
        return $this;
    }

    /**
     * Placeholder for holding array of patch objects
     *
     * @return \SkrillPay\Api\Patch[]
     */
    public function getPatches()
    {
        return $this->patches;
    }

    /**
     * Append Patches to the list.
     *
     * @param \SkrillPay\Api\Patch $patch
     * @return $this
     */
    public function addPatch($patch)
    {
        if (!$this->getPatches()) {
            return $this->setPatches(array($patch));
        } else {
            return $this->setPatches(
                array_merge($this->getPatches(), array($patch))
            );
        }
    }

    /**
     * Remove Patches from the list.
     *
     * @param \SkrillPay\Api\Patch $patch
     * @return $this
     */
    public function removePatch($patch)
    {
        return $this->setPatches(
            array_diff($this->getPatches(), array($patch))
        );
    }

    /**
     * As PatchRequest holds the array of Patch object, we would override the json conversion to return
     * a json representation of array of Patch objects.
     *
     * @param int $options
     * @return mixed|string
     */
    public function toJSON($options = 0)
    {
        $json = array();
        foreach ($this->getPatches() as $patch) {
            $json[] = $patch->toArray();
        }
        return str_replace('\\/', '/', json_encode($json, $options));
    }
}
