<?php

require_once('../model/urlHelper.php');

class TableHelper {

    public static function sort(string $sortKey, string $label, array $data): string 
    {
        $sort = $data['sort'] ?? null;
        $direction = $data['dir'] ?? null;

        // Permet d'indiquer avec un icône si on est sur un tri décroissant ou croissant
        $icon = "";
        if ($sort === $sortKey) {
            $icon = $direction === 'asc' ? "^" : 'v';
        }
        $url = URLHelper::withParams($data, [
            'sort' => $sortKey,
            // Le $sort === $sortKey permet d'activer le changement entre 'asc' et 'desc' seulement si on se trouve sur la même colonne
            'dir' => $direction === 'asc' && $sort === $sortKey ? 'desc' : 'asc'
        ]);

        // Replace le label de chaque colonne
        return <<<HTML
            <a href="?$url">$label $icon</a>
        HTML;
    }
}