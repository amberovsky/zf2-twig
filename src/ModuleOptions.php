<?php

namespace ZfcTwig;

use Zend\Stdlib\AbstractOptions;

class ModuleOptions extends AbstractOptions
{
    /**
     * @var string
     */
    protected $environmentLoader;

    /**
     * @var string
     */
    protected $environmentClass;

    /**
     * @var array
     */
    protected $environmentOptions = [];

    /**
     * @var array
     */
    protected $globals = [];

    /**
     * @var array
     */
    protected $loaderChain = [];

    /**
     * @var array
     */
    protected $extensions = [];

    /**
     * @var string
     */
    protected $suffix;

    /**
     * @var bool
     */
    protected $enableFallbackFunctions = true;

    /**
     * @var bool
     */
    protected $disableZfmodel = true;

    /**
     * @var array
     */
    protected $helperManager = [];

	/**
	 * @var bool
	 */
	protected $debug = false;

	/**
	 * @var bool|string
	 */
	protected $cache = false;

	/**
	 * @var bool
	 */
	protected $autoReload = false;

    /**
     * @param boolean $disableZfmodel
     * @return ModuleOptions
     */
    public function setDisableZfmodel($disableZfmodel)
    {
        $this->disableZfmodel = $disableZfmodel;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getDisableZfmodel()
    {
        return $this->disableZfmodel;
    }

    /**
     * @param boolean $enableFallbackFunctions
     * @return ModuleOptions
     */
    public function setEnableFallbackFunctions($enableFallbackFunctions)
    {
        $this->enableFallbackFunctions = $enableFallbackFunctions;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getEnableFallbackFunctions()
    {
        return $this->enableFallbackFunctions;
    }

    /**
     * @param mixed $environmentLoader
     * @return ModuleOptions
     */
    public function setEnvironmentLoader($environmentLoader)
    {
        $this->environmentLoader = $environmentLoader;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEnvironmentLoader()
    {
        return $this->environmentLoader;
    }

    /**
     * @param array $environmentOptions
     * @return ModuleOptions
     */
    public function setEnvironmentOptions($environmentOptions)
    {
        $this->environmentOptions = $environmentOptions;
        return $this;
    }

    /**
     * @return array
     */
    public function getEnvironmentOptions()
    {
        return $this->environmentOptions;
    }

    /**
     * @param array $extensions
     * @return ModuleOptions
     */
    public function setExtensions($extensions)
    {
        $this->extensions = $extensions;
        return $this;
    }

    /**
     * @return array
     */
    public function getExtensions()
    {
        return $this->extensions;
    }

    /**
     * @param array $helperManager
     * @return ModuleOptions
     */
    public function setHelperManager($helperManager)
    {
        $this->helperManager = $helperManager;
        return $this;
    }

    /**
     * @return array
     */
    public function getHelperManager()
    {
        return $this->helperManager;
    }

    /**
     * @param array $loaderChain
     * @return ModuleOptions
     */
    public function setLoaderChain($loaderChain)
    {
        $this->loaderChain = $loaderChain;
        return $this;
    }

    /**
     * @return array
     */
    public function getLoaderChain()
    {
        return $this->loaderChain;
    }

    /**
     * @param string $suffix
     * @return ModuleOptions
     */
    public function setSuffix($suffix)
    {
        $this->suffix = $suffix;
        return $this;
    }

    /**
     * @return string
     */
    public function getSuffix()
    {
        return $this->suffix;
    }

    /**
     * @param string $environmentClass
     */
    public function setEnvironmentClass($environmentClass)
    {
        $this->environmentClass = $environmentClass;
    }

    /**
     * @return string
     */
    public function getEnvironmentClass()
    {
        return $this->environmentClass;
    }

    /**
     * @param array $globals
     */
    public function setGlobals($globals)
    {
        $this->globals = $globals;
    }

    /**
     * @return array
     */
    public function getGlobals()
    {
        return $this->globals;
    }

	/**
	 * @param bool $debug
	 */
	public function setDebug($debug)
	{
		$this->debug = $debug;
	}

	/**
	 * @return bool
	 */
	public function getDebug()
	{
		return $this->debug;
	}

	/**
	 * @param bool|string $cache
	 */
	public function setCache($cache)
	{
		$this->cache = $cache;
	}

	/**
	 * @return bool|string
	 */
	public function getCache()
	{
		return $this->cache;
	}

	/**
	 * @param bool $autoReload
	 */
	public function setAutoReload($autoReload)
	{
		$this->autoReload = $autoReload;
	}

	/**
	 * @return bool
	 */
	public function getAutoReload()
	{
		return $this->autoReload;
	}
}
