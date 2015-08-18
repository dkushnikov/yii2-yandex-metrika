<?php
namespace yii\widgets;

use yii\base\Widget;

class YandexMetrikaCounter extends Widget
{
    const TYPE_ASYNC    = 'async';
    const TYPE_SYNC     = 'sync';
    const TYPE_INFORMER = 'informer';

    public $counterId = null;
    public $type      = self::TYPE_ASYNC;

    public $noindex             = true;
    public $noscript            = true;
    public $webvisor            = false;
    public $trackHash           = false;
    public $clickmap            = true;
    public $trackLinks          = false;
    public $accurateTrackBounce = false;

    public $visitParams = [];

    private $_viewFile   = null;
    private $_viewParams = [];

    public function init()
    {
        parent::init();

        $this->_viewParams = [
            'counterId'     => $this->counterId,
            'counterParams' => [
                'id'                  => intval($this->counterId),
                'webvisor'            => (bool)$this->webvisor,
                'trackHash'           => (bool)$this->trackHash,
                'clickmap'            => (bool)$this->clickmap,
                'trackLinks'          => (bool)$this->trackLinks,
                'accurateTrackBounce' => (bool)$this->accurateTrackBounce,
                'ut'                  => $this->noindex ? 'noindex' : '',
                'params'              => $this->visitParams
            ],
        ];

        $viewFileMap = [
            self::TYPE_ASYNC    => 'async',
            self::TYPE_SYNC     => 'sync',
            self::TYPE_INFORMER => 'informer',
        ];
        if ($this->type === self::TYPE_INFORMER) {
            $this->noscript = false;
        }

        $this->_viewFile = isset($viewFileMap[$this->type]) ? $viewFileMap[$this->type] : null;
    }


    public function run()
    {
        assert($this->_viewFile !== null);

        echo $this->render($this->_viewFile, $this->_viewParams);
        if ($this->noscript) {
            echo $this->render('noscript', ['counterId' => $this->counterId]);
        }
    }


} 
