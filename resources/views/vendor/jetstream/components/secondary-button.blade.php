<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center rounded-lg px-4 py-2 text-xs+ border
                                bg-slate-150 text-slate-600 ring-primary/50 hover:bg-slate-200 focus:ring border-slate-200 transition
                                dark:border-navy-750 dark:bg-navy-700 dark:text-navy-400 dark:ring-accent/50 dark:hover:bg-navy-800 dark:focus:bg-navy-800']) }}>
    {{ $slot }}
</button>
