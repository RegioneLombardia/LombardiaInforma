<?php

namespace luya\admin\ngrest;

/**
 * NgRest Config Interface
 *
 * @since 1.0.0
 */
interface ConfigInterface
{
    public function setConfig(array $config);

    public function getConfig();

    public function getExtraFields();

    public function onFinish();
    
    // ensured
    
    public function getHash();
    
    public function getPrimaryKey();
    
    public function setDefaultOrder($defaultOrder);
    
    public function getDefaultOrderDirection();
    
    public function getDefaultOrderField();

    public function getTableName();
    
    public function getOption($key);

    public function getGroupByField();

    /**
     * Determine whether the groups are expanded by default or not.
     * If enabled, the groups are expanded otherwise they are collapsed.
     * @since 1.2.2.1
     * @return bool
     */
    public function getGroupByExpanded();
    
    public function getFilters();
    
    public function getAttributeGroups();
    
    public function getApiEndpoint();

    public function getRelations();
    
    public function setAttributeLabels(array $labels);

    /**
     * Get an array with the button configuration like hash, label and icon.
     *
     * @return array An array with hash, label and icon key.
     * @since 1.2.3
     */
    public function getActiveButtons();
}
