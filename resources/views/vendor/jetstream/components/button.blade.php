<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center rounded-lg px-4 py-2 text-xs+ border transition
                                bg-slate-200 text-slate-800 ring-primary/50 hover:bg-slate-300 focus:ring border-slate-300
                                dark:border-navy-750 dark:bg-navy-800 dark:text-navy-400 dark:ring-accent/50 dark:hover:bg-navy-900 dark:focus:bg-navy-900 transition']) }}>
    {{ $slot }}
</button>
