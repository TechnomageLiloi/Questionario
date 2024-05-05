<?php

namespace Liloi\Rune\API;

use Liloi\Config\Pool;
use Liloi\Judex\Assert;
use Liloi\API\Response;
use Liloi\Rune\Security;
use Liloi\Rune\Exceptions\AccessException;

abstract class Method
{
    /**
     * Configuration data ppol.
     *
     * @var Pool
     */
    static private Pool $config;

    /**
     * Body of API method.
     *
     * @return Response
     */
    abstract public static function execute(): Response;

    /**
     * Get parameter value by name.
     *
     * @param string $name Parameter name.
     * @return mixed Parameter value.
     */
    public static function getParameter(string $name)
    {
        $parameters = self::getParameters();

        Assert::true(isset($parameters[$name]), 'Parameter name is not found.', [
            'parameters' => $parameters,
            'name' => $name
        ]);

        return $parameters[$name];
    }

    /**
     * Get all list of API parameters.
     *
     * @return array List of API parameters.
     */
    public static function getParameters(): array
    {
        return $_POST['parameters'];
    }


    public static function getParameterExist(string $name): bool
    {
        return isset($_POST['parameters'][$name]);
    }

    /**
     * Render templates.
     *
     * @param string $template
     * @param array $data
     * @return string
     */
    protected static function render(string $template, array $data = []): string
    {
        // @todo: assert filename

        extract($data);

        ob_start();
        include($template);
        $output = ob_get_clean();

        return $output;
    }

    /**
     * Gets configuration data object.
     *
     * @return Pool Configuration data object.
     */
    public static function getConfig(): Pool
    {
        return static::$config;
    }

    /**
     * Sets configuration data object.
     *
     * @param Pool $config
     */
    public static function setConfig(Pool $config): void
    {
        static::$config = $config;
    }

    /**
     * Get access.
     *
     * @return bool `true` if admin access allowed, `false` if it is denied.
     */
    public static function accessGet(): bool
    {
        return Security::check();
    }

    /**
     * Check access. If admin access is denied, {@link AccessException} would be rose.
     *
     * @throws AccessException
     */
    public static function accessCheck(): void
    {
        if(Security::check())
        {
            return;
        }

        throw new AccessException();
    }
}