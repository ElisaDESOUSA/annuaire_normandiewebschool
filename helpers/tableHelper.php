<?php

require_once('../helpers/urlHelper.php');

class TableHelper {

    public static function sort(string $sortKey, string $label, array $data): string 
    {
        $sort = $data['sort'] ?? null;
        $direction = $data['dir'] ?? null;

        // Permet d'indiquer avec un icône si on est sur un tri décroissant ou croissant
        $icon = "";

        // Icones pour indiquer si c'est décroissant ou croissant
        $asc = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
        <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
        </svg>';
        $desc = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
        </svg>';

        if ($sort === $sortKey) {
            $icon = $direction === 'asc' ? "$asc" : "$desc";
        }
        $url = URLHelper::withParams($data, [
            'sort' => $sortKey,
            // Le $sort === $sortKey permet d'activer le changement entre 'asc' et 'desc' seulement si on se trouve sur la même colonne
            'dir' => $direction === 'asc' && $sort === $sortKey ? 'desc' : 'asc'
        ]);

        // Replace le label de chaque colonne
        return <<<HTML
            <a href="?$url" class="label-tri">$label $icon</a>
        HTML;
    }
}