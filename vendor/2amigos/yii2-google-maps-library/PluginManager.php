<?php
/**
 */
namespace dosamigos\google\maps;


use yii\base\BaseObject;
use yii\helpers\ArrayHelper;

/**
 * PluginManager
 *
 * Manages installed plugins.
 *
 * @package dosamigos\google\maps
 */
class PluginManager extends BaseObject
{
    /**
     * @var array stores the managed plugins
     */
    private $_plugins = [];

    /**
     * Check whether we have a plugin installed with that name previous firing up the call
     *
     * @param string $name
     *
     * @return mixed|void
     */
    public function __get($name)
    {
        if (ArrayHelper::keyExists($name, $this->getInstalledPlugins())) {
            return $this->getPlugin($name);
        }
        return parent::__get($name);
    }

    /**
     * Installs a plugin
     *
     * @param PluginAbstract $plugin
     *
     * @return void
     */
    public function install(PluginAbstract $plugin)
    {
        $this->_plugins[$plugin->getPluginName()] = $plugin;
    }

    /**
     * Removes a plugin
     *
     * @param PluginAbstract $plugin
     *
     * @return mixed|null the value of the element if found, default value otherwise
     */
    public function remove(PluginAbstract $plugin)
    {
        return ArrayHelper::remove($this->_plugins, $plugin->getPluginName());
    }

    /**
     * @param \yii\web\View $view
     * Registers plugin bundles
     */
    public function registerAssetBundles($view)
    {
        foreach ($this->_plugins as $plugin) {
            /** @var PluginAbstract $plugin */
            $plugin->registerAssetBundle($view);
        }
    }

    /**
     * @return array of installed plugins
     */
    public function getInstalledPlugins()
    {
        return $this->_plugins;
    }

    /**
     * Returns an installed plugin by name
     *
     * @param string $name
     *
     * @return PluginAbstract|null
     */
    public function getPlugin($name)
    {
        return isset($this->_plugins[$name]) ? $this->_plugins[$name] : null;
    }
}
