<?php

namespace assets\includes;

class pagination
{
    public static function getOffset(int $page, int $perPage): int {
        $page = max(1, $page);
        return ($page - 1) * $perPage;
    }

    public static function getTotalPages(int $totalItems, int $perPage): int {
        return max(1, (int) ceil($totalItems / $perPage));
    }

    public static function renderLinks(int $currentPage, int $totalPages, string $baseUrl): void {
        if ($totalPages <= 1) {
            return;
        }

        echo '<nav class="pagination">';

        for ($i = 1; $i <= $totalPages; $i++) {
            $class = ($i === $currentPage) ? ' class="pagination__current"' : '';
            echo "<a href=\"{$baseUrl}?page={$i}\"{$class}>{$i}</a> ";
        }

        echo '</nav>';
    }

}