<aside class="hidden sm:block bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 w-52 overflow-y-auto">
    <div class="mt-2 px-2">
        <ul class="space-y-2">
            <x-sidebar-link href="{{ route('admin.dashboard.index') }}" :active="request()->routeIs('admin.dashboard.index')">
                {{ __('sidebar.dashboard') }}
            </x-sidebar-link>
            <div class="flex items-center justify-between gap-2 py-4">
                <div class="h-[1px] w-full bg-gray-300 dark:bg-gray-700"></div>
                <div class="text-xs text-gray-500">Module</div>
                <div class="h-[1px] w-full bg-gray-300 dark:bg-gray-700"></div>
            </div>
            @canany(['blog_show'])
                @if (Module::collections()->has('Blog'))
                    <x-sidebar-dropdown label="{{ __('sidebar.blogs.parent') }}" :active="request()->routeIs('admin.blog.*')" icon="fa-solid fa-blog">
                        @can('blog_category_show')
                            <x-sidebar-dropdown-link href="{{ route('admin.blog.categories.index') }}" :active="request()->routeIs('admin.blog.categories.*')">
                                {{ __('sidebar.blogs.categories') }}
                            </x-sidebar-dropdown-link>
                        @endcan
                        @can('blog_tag_show')
                            <x-sidebar-dropdown-link href="{{ route('admin.blog.tags.index') }}" :active="request()->routeIs('admin.blog.tags.*')">
                                {{ __('sidebar.blogs.tags') }}
                            </x-sidebar-dropdown-link>
                        @endcan
                        @can('blog_post_show')
                            <x-sidebar-dropdown-link href="{{ route('admin.blog.posts.index') }}" :active="request()->routeIs('admin.blog.posts.*')">
                                {{ __('sidebar.blogs.post') }}
                            </x-sidebar-dropdown-link>
                        @endcan
                    </x-sidebar-dropdown>
                @endif
            @endcanany
            @canany(['mailconfig_show'])
                @if (Module::collections()->has('MailConfig'))
                    <x-sidebar-dropdown label="{{ __('sidebar.mail_config.parent') }}" :active="request()->routeIs('admin.mail-config.*')"
                        icon="fa-solid fa-envelope-circle-check">
                        @can('mailconfig_smtpconfig_show')
                            <x-sidebar-dropdown-link href="{{ route('admin.mail-config.smtp-settings.index') }}"
                                :active="request()->routeIs('admin.mail-config.smtp-settings.*')">
                                {{ __('sidebar.mail_config.smtp_setting') }}
                            </x-sidebar-dropdown-link>
                        @endcan
                        @can('mailconfig_mailtest_show')
                            <x-sidebar-dropdown-link href="{{ route('admin.mail-config.mail-test.index') }}" :active="request()->routeIs('admin.mail-config.mail-test.*')">
                                {{ __('sidebar.mail_config.mail_test') }}
                            </x-sidebar-dropdown-link>
                        @endcan
                    </x-sidebar-dropdown>
                @endif
            @endcanany
            <div class="flex items-center justify-between gap-2 py-4">
                <div class="h-[1px] w-full bg-gray-300 dark:bg-gray-700"></div>
                <div class="text-xs text-gray-500">Module</div>
                <div class="h-[1px] w-full bg-gray-300 dark:bg-gray-700"></div>
            </div>
            @canany(['user_show', 'role_show'])
                <x-sidebar-dropdown label="{{ __('sidebar.users.parent') }}" :active="request()->routeIs('admin.users.*') || request()->routeIs('admin.roles.*')" icon="fa-solid fa-user">
                    @can('user_show')
                        <x-sidebar-dropdown-link href="{{ route('admin.users.index') }}" :active="request()->routeIs('admin.users.*')">
                            {{ __('sidebar.users.users') }}
                        </x-sidebar-dropdown-link>
                    @endcan
                    @can('role_show')
                        <x-sidebar-dropdown-link href="{{ route('admin.roles.index') }}" :active="request()->routeIs('admin.roles.*')">
                            {{ __('sidebar.users.roles') }}</x-sidebar-dropdown-link>
                    @endcan
                </x-sidebar-dropdown>
            @endcanany
            @canany(['user_show', 'role_show'])
                <x-sidebar-dropdown label="{{ __('sidebar.settings.parent') }}" :active="request()->is('telescope') || request()->routeIs('admin.sitemap.index')"
                    icon="fa-solid fa-screwdriver-wrench">
                    @can('user_show')
                        <x-sidebar-dropdown-link href="telescope" target="_blank" :active="request()->is('telescope')">
                            {{ __('sidebar.settings.telescope') }}
                        </x-sidebar-dropdown-link>
                    @endcan
                    @can('generate_sitemap')
                        <x-sidebar-dropdown-link href="{{ route('admin.sitemap.index') }}" :active="request()->routeIs('admin.sitemap.index')">
                            {{ __('sidebar.settings.generate_sitemap') }}
                        </x-sidebar-dropdown-link>
                    @endcan
                </x-sidebar-dropdown>
            @endcanany
        </ul>
    </div>
</aside>
