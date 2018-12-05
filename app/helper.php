<?php

if (!function_exists('rupiah')) {

    function rupiah(int $number)
    {
        return 'Rp.' . number_format($number, 2, ',', '.');
    }
}

if (!function_exists('increment_slug')) {

    /**
     * @param $title
     * @param $model
     * @param string $slugColumn
     * @return string
     */
    function increment_slug($title, $model, $slugColumn = 'slug')
    {
//        https://dotdev.co/creating-unique-title-slugs-with-laravel/

        // Normalize the title
        $slug = str_slug($title);

        // Get any that could possibly be related.
        // This cuts the queries down by doing it once.
        $allSlugs = $model::select($slugColumn)->where($slugColumn, 'like', $slug . '%')
            ->get();

        // If we haven't used it before then we are all good.
        if (!$allSlugs->contains($slugColumn, $slug)) {
            return $slug;
        }

        // Just append numbers like a savage until we find not used.
        for ($i = 1; $i <= 10; $i++) {
            $newSlug = $slug . '-' . $i;
            if (!$allSlugs->contains($slugColumn, $newSlug)) {
                return $newSlug;
            }
        }
    }
}

if (!function_exists('is_administrative')) {

    function is_administrative()
    {
        if (!\Sentinel::check())
            return false;

        $user = Sentinel::getUser();
        $roles = $user->roles->pluck('slug')->toArray();

        if (in_array('administrative', $roles)) {
            return true;
        }

        return false;
    }
}

if (!function_exists('is_midwife')) {

    function is_midwife()
    {
        if (!\Sentinel::check())
            return false;

        $user = Sentinel::getUser();
        $roles = $user->roles->pluck('slug')->toArray();

        if (in_array('midwife', $roles)) {
            return true;
        }

        return false;
    }
}

if (!function_exists('is_finance')) {

    function is_finance()
    {
        if (!\Sentinel::check())
            return false;

        $user = Sentinel::getUser();
        $roles = $user->roles->pluck('slug')->toArray();

        if (in_array('finance', $roles)) {
            return true;
        }

        return false;
    }
}
