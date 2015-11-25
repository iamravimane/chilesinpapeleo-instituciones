<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entities\NavItem
 */
class NavItem
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $title
     */
    private $title;

    /**
     * @var string $alias
     */
    private $alias;

    /**
     * @var string $layout
     */
    private $layout;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    private $children;

    /**
     * @var Entities\Nav
     */
    private $nav;

    /**
     * @var Entities\NavItem
     */
    private $parent;

    /**
     * @var Entities\Page
     */
    private $page;

    public function __construct()
    {
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return NavItem
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set alias
     *
     * @param string $alias
     * @return NavItem
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;
        return $this;
    }

    /**
     * Get alias
     *
     * @return string 
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Set layout
     *
     * @param string $layout
     * @return NavItem
     */
    public function setLayout($layout)
    {
        $this->layout = $layout;
        return $this;
    }

    /**
     * Get layout
     *
     * @return string 
     */
    public function getLayout()
    {
        return $this->layout;
    }

    /**
     * Add children
     *
     * @param Entities\NavItem $children
     * @return NavItem
     */
    public function addNavItem(\Entities\NavItem $children)
    {
        $this->children[] = $children;
        return $this;
    }

    /**
     * Get children
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Set nav
     *
     * @param Entities\Nav $nav
     * @return NavItem
     */
    public function setNav(\Entities\Nav $nav = null)
    {
        $this->nav = $nav;
        return $this;
    }

    /**
     * Get nav
     *
     * @return Entities\Nav 
     */
    public function getNav()
    {
        return $this->nav;
    }

    /**
     * Set parent
     *
     * @param Entities\NavItem $parent
     * @return NavItem
     */
    public function setParent(\Entities\NavItem $parent = null)
    {
        $this->parent = $parent;
        return $this;
    }

    /**
     * Get parent
     *
     * @return Entities\NavItem 
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set page
     *
     * @param Entities\Page $page
     * @return NavItem
     */
    public function setPage(\Entities\Page $page = null)
    {
        $this->page = $page;
        return $this;
    }

    /**
     * Get page
     *
     * @return Entities\Page 
     */
    public function getPage()
    {
        return $this->page;
    }
    /**
     * @var boolean $homepage
     */
    private $homepage;


    /**
     * Set homepage
     *
     * @param boolean $homepage
     * @return NavItem
     */
    public function setHomepage($homepage)
    {
        $this->homepage = $homepage;
        return $this;
    }

    /**
     * Get homepage
     *
     * @return boolean 
     */
    public function getHomepage()
    {
        return $this->homepage;
    }
    /**
     * @var string $customurl
     */
    private $customurl;


    /**
     * Set customurl
     *
     * @param string $customurl
     * @return NavItem
     */
    public function setCustomurl($customurl)
    {
        $this->customurl = $customurl;
        return $this;
    }

    /**
     * Get customurl
     *
     * @return string 
     */
    public function getCustomurl()
    {
        return $this->customurl;
    }
    /**
     * @var integer $ordering
     */
    private $ordering;


    /**
     * Set ordering
     *
     * @param integer $ordering
     * @return NavItem
     */
    public function setOrdering($ordering)
    {
        $this->ordering = $ordering;
        return $this;
    }

    /**
     * Get ordering
     *
     * @return integer 
     */
    public function getOrdering()
    {
        return $this->ordering;
    }
    /**
     * @var string $orderBy
     */
    private $orderBy;


    /**
     * Set orderBy
     *
     * @param string $orderBy
     * @return NavItem
     */
    public function setOrderBy($orderBy)
    {
        $this->orderBy = $orderBy;
        return $this;
    }

    /**
     * Get orderBy
     *
     * @return string 
     */
    public function getOrderBy()
    {
        return $this->orderBy;
    }
}