<?php

namespace Freelabois\LaravelQuickstart\Traits;

use Freelabois\LaravelQuickstart\Extendables\Resource;
use Freelabois\LaravelQuickstart\Interfaces\ManipulationManagerInterface;
use Freelabois\LaravelQuickstart\Interfaces\RepositoryInterface;

trait Crudable {
    use
        DoIndex,
        DoStore,
        DoUpdate,
        DoShow,
        DoDestroy;

    /**
     * @var ManipulationManagerInterface
     */
    protected $manager;
    /**
     * @var RepositoryInterface
     */
    protected $repository;


    /**
     * CrudController constructor.
     * @param ManipulationManagerInterface $manager
     * @param RepositoryInterface $repository
     */
    public function setup(
        ManipulationManagerInterface $manager,
        RepositoryInterface $repository
    ) {
        $this->manager = $manager;
        $this->repository = $repository;

        if (!isset($this->resource)) {
            $this->resource = Resource::class;
        }
    }


    public function iso8859toutf8($returnable) {
        $array = [];
        if (is_object($returnable) || is_array($returnable)) {
            foreach ($returnable as $key => $returnable_value) {
                dump($key, $returnable_value);
                if (is_string($returnable_value)) {
                    $array[iconv("ISO-8859-1", "UTF-8", $key)] = iconv("ISO-8859-1", "UTF-8", $returnable_value);
                } else if (is_object($returnable_value) || is_array($returnable_value)) {
                    $array[iconv("ISO-8859-1", "UTF-8", $key)] = $this->iso8859toutf8($returnable_value);
                }
            }
        }

        dd(is_object($returnable), is_array($returnable));
        return $array;
    }
}
