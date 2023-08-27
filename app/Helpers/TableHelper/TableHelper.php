<?php

namespace App\Helpers\TableHelper;

use App\Helpers\URLHelper\URL;

class TableHelper{

    /**
     * @var array
     */
    private array $sortable = [];

    public function setSortable(string $key, string $title): self
    {
        $this->sortable[$key] = $title;
        return $this;
    }

    public function getSortable(): array{
        return $this->sortable;
    }

    public function getSort(): string{
        return request('sort', 'id');
    }

    public function getDir(): string{
        if (!empty($_GET['dir'])){
            if(!in_array($_GET['dir'], ['ASC', 'DESC'])){
                return 'ASC';
            }else{
                return $_GET['dir'];
            }
        }
        return 'ASC';
    }

    /**
     * @param string $key
     * @return string
     */
    public function th(string $key): string
    {
        if (empty($this->sortable[$key])){
            return $key;
        }
        $sort = request('sort') ?? null;
        $direction = strtoupper(request('dir', 'ASC'));
        if(!in_array($direction, ['ASC', 'DESC'])){
            $direction = 'ASC';
        }
        if(!is_null($direction) && $sort === $key){
            $icon = $direction === "ASC" ? '<img src="/vendors/images/svg/arrow-up.svg" alt="" width="15" style="margin-left: 6px;">' : '<img src="/vendors/images/svg/arrow-down.svg" alt="" width="15" style="margin-left: 6px;">';
        }else{
            $icon = "<img src='/vendors/images/svg/filter.svg' alt='' width='15' style='margin-left: 6px;'>";
        }

        $url = URL::withParams($_GET,[
            'sort' => $key,
            'dir' => $direction === "ASC" && $sort === $key ? "DESC" : "ASC"
        ]);
        return <<<HTML
            <a href="?$url">{$this->sortable[$key]} $icon</a>
HTML;
    }
}
