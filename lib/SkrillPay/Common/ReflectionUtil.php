<?php

namespace SkrillPay\Common;

use SkrillPay\Exception\SkrillPayConfigurationException;

/**
 * Class ReflectionUtil
 *
 * @package SkrillPay\Common
 */
class ReflectionUtil
{

    /**
     * Reflection Methods
     *
     * @var \ReflectionMethod[]
     */
    private static $propertiesRefl = array();

    /**
     * Properties Type
     *
     * @var string[]
     */
    private static $propertiesType = array();


    /**
     * @param $class
     * @param $propertyName
     * @return array|string|null
     * @throws SkrillPayConfigurationException
     * @throws \ReflectionException
     */
    public static function getPropertyClass($class, $propertyName)
    {
        if ($class == get_class(new SkrillPayModel())) {
            // Make it generic if SkrillPayModel is used for generating this
            return get_class(new SkrillPayModel());
        }

        // If the class doesn't exist, or the method doesn't exist, return null.
        if (!class_exists($class) || !method_exists($class, self::getter($class, $propertyName))) {
            return null;
        }

        if (($annotations = self::propertyAnnotations($class, $propertyName)) && isset($annotations['return'])) {
            $param = $annotations['return'];
        }

        if (isset($param)) {
            $anno = preg_split("/[\s\[\]]+/", $param);
            return $anno[0];
        } else {
            throw new SkrillPayConfigurationException("Getter function for '$propertyName' in '$class' class should have a proper return type.");
        }
    }

    /**
     * @param $class
     * @param $propertyName
     * @return bool|null
     * @throws SkrillPayConfigurationException
     * @throws \ReflectionException
     */
    public static function isPropertyClassArray($class, $propertyName)
    {
        // If the class doesn't exist, or the method doesn't exist, return null.
        if (!class_exists($class) || !method_exists($class, self::getter($class, $propertyName))) {
            return null;
        }

        if (($annotations = self::propertyAnnotations($class, $propertyName)) && isset($annotations['return'])) {
            $param = $annotations['return'];
        }

        if (isset($param)) {
            return substr($param, -strlen('[]'))==='[]';
        } else {
            throw new SkrillPayConfigurationException("Getter function for '$propertyName' in '$class' class should have a proper return type.");
        }
    }

    /**
     * @param $class
     * @param $propertyName
     * @return mixed|null
     * @throws \ReflectionException
     */
    public static function propertyAnnotations($class, $propertyName)
    {
        $class = is_object($class) ? get_class($class) : $class;
        if (!class_exists('ReflectionProperty')) {
            throw new \RuntimeException("Property type of " . $class . "::{$propertyName} cannot be resolved");
        }

        if ($annotations =& self::$propertiesType[$class][$propertyName]) {
            return $annotations;
        }

        if (!($refl =& self::$propertiesRefl[$class][$propertyName])) {
            $getter = self::getter($class, $propertyName);
            $refl = new \ReflectionMethod($class, $getter);
            self::$propertiesRefl[$class][$propertyName] = $refl;
        }

        // todo: smarter regexp
        if (!preg_match_all(
            '~\@([^\s@\(]+)[\t ]*(?:\(?([^\n@]+)\)?)?~i',
            $refl->getDocComment(),
            $annots,
            PREG_PATTERN_ORDER)) {
            return null;
        }
        foreach ($annots[1] as $i => $annot) {
            $annotations[strtolower($annot)] = empty($annots[2][$i]) ? true : rtrim($annots[2][$i], " \t\n\r)");
        }

        return $annotations;
    }

    /**
     * preg_replace_callback callback function
     *
     * @param $match
     * @return string
     */
    private static function replace_callback($match)
    {
        return ucwords($match[2]);
    }

    /**
     * Returns the properly formatted getter function name based on class name and property
     * Formats the property name to a standard getter function
     *
     * @param string $class
     * @param string $propertyName
     * @return string getter function name
     */
    public static function getter($class, $propertyName)
    {
        return method_exists($class, "get" . ucfirst($propertyName)) ?
            "get" . ucfirst($propertyName) :
            "get" . preg_replace_callback("/([_\-\s]?([a-z0-9]+))/", "self::replace_callback", $propertyName);
    }
}
