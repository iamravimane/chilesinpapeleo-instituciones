<?php

namespace Proxies\__CG__\Entities;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class NavItem extends \Entities\NavItem implements \Doctrine\ORM\Proxy\Proxy
{
    private $_entityPersister;
    private $_identifier;
    public $__isInitialized__ = false;
    public function __construct($entityPersister, $identifier)
    {
        $this->_entityPersister = $entityPersister;
        $this->_identifier = $identifier;
    }
    /** @private */
    public function __load()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;

            if (method_exists($this, "__wakeup")) {
                // call this after __isInitialized__to avoid infinite recursion
                // but before loading to emulate what ClassMetadata::newInstance()
                // provides.
                $this->__wakeup();
            }

            if ($this->_entityPersister->load($this->_identifier, $this) === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            unset($this->_entityPersister, $this->_identifier);
        }
    }

    /** @private */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int) $this->_identifier["id"];
        }
        $this->__load();
        return parent::getId();
    }

    public function setTitle($title)
    {
        $this->__load();
        return parent::setTitle($title);
    }

    public function getTitle()
    {
        $this->__load();
        return parent::getTitle();
    }

    public function setAlias($alias)
    {
        $this->__load();
        return parent::setAlias($alias);
    }

    public function getAlias()
    {
        $this->__load();
        return parent::getAlias();
    }

    public function setLayout($layout)
    {
        $this->__load();
        return parent::setLayout($layout);
    }

    public function getLayout()
    {
        $this->__load();
        return parent::getLayout();
    }

    public function addNavItem(\Entities\NavItem $children)
    {
        $this->__load();
        return parent::addNavItem($children);
    }

    public function getChildren()
    {
        $this->__load();
        return parent::getChildren();
    }

    public function setNav(\Entities\Nav $nav = NULL)
    {
        $this->__load();
        return parent::setNav($nav);
    }

    public function getNav()
    {
        $this->__load();
        return parent::getNav();
    }

    public function setParent(\Entities\NavItem $parent = NULL)
    {
        $this->__load();
        return parent::setParent($parent);
    }

    public function getParent()
    {
        $this->__load();
        return parent::getParent();
    }

    public function setPage(\Entities\Page $page = NULL)
    {
        $this->__load();
        return parent::setPage($page);
    }

    public function getPage()
    {
        $this->__load();
        return parent::getPage();
    }

    public function setHomepage($homepage)
    {
        $this->__load();
        return parent::setHomepage($homepage);
    }

    public function getHomepage()
    {
        $this->__load();
        return parent::getHomepage();
    }

    public function setCustomurl($customurl)
    {
        $this->__load();
        return parent::setCustomurl($customurl);
    }

    public function getCustomurl()
    {
        $this->__load();
        return parent::getCustomurl();
    }

    public function setOrdering($ordering)
    {
        $this->__load();
        return parent::setOrdering($ordering);
    }

    public function getOrdering()
    {
        $this->__load();
        return parent::getOrdering();
    }

    public function setOrderBy($orderBy)
    {
        $this->__load();
        return parent::setOrderBy($orderBy);
    }

    public function getOrderBy()
    {
        $this->__load();
        return parent::getOrderBy();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'title', 'alias', 'layout', 'homepage', 'customurl', 'ordering', 'children', 'nav', 'parent', 'page');
    }

    public function __clone()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;
            $class = $this->_entityPersister->getClassMetadata();
            $original = $this->_entityPersister->load($this->_identifier);
            if ($original === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            foreach ($class->reflFields AS $field => $reflProperty) {
                $reflProperty->setValue($this, $reflProperty->getValue($original));
            }
            unset($this->_entityPersister, $this->_identifier);
        }
        
    }
}