function page (path) {
  return () => import(/* webpackChunkName: '' */ `~/pages/${path}`).then(m => m.default || m)
}

export default [
  { path: '/', name: 'welcome', component: page('welcome.vue') },
  { path: '/about', name: 'about', component: page('about.vue') },

  { path: '/login', name: 'login', component: page('auth/login.vue'), meta: { requiresNav: false} },
  { path: '/register', name: 'register', component: page('auth/register.vue'), meta: { requiresNav: false}  },
  { path: '/password/reset', name: 'password.request', component: page('auth/password/email.vue'), meta: { requiresNav: false}  },
  { path: '/password/reset/:token', name: 'password.reset', component: page('auth/password/reset.vue'), meta: { requiresNav: false}  },
  { path: '/email/verify/:id', name: 'verification.verify', component: page('auth/verification/verify.vue'), meta: { requiresNav: false}  },
  { path: '/email/resend', name: 'verification.resend', component: page('auth/verification/resend.vue'), meta: { requiresNav: false}  },

  { path: '/home', name: 'home', component: page('home.vue') },
  { path: '/settings',
    component: page('settings/index.vue'),
    children: [
      { path: '', redirect: { name: 'settings.profile' } },
      { path: 'profile', name: 'settings.profile', component: page('settings/profile.vue') },
      { path: 'password', name: 'settings.password', component: page('settings/password.vue') }
    ] },

  { path: '/users',
  component: page('users/users.vue'),
  children: [
    { path: '', redirect: { name: 'users.all' } },
    { path: 'all', name: 'users.all', component: page('users/users.vue') },
    { path: 'suspended', name: 'users.suspended', component: page('users/users.vue') }
  ] },

  { path: '/user/:id', name: 'user', component: page('users/user.vue') },

  { path: '/alert/:id', redirect: { name: 'alerts.view' } },
  { path: '/alert', redirect: { name: 'alerts.all' } },

  { path: '/alerts',
  component: page('alerts/index.vue'),
  children: [
    { path: '', redirect: { name: 'alerts.all' } },
    { path: 'all', name: 'alerts.all', component: page('alerts/all.vue') },
    { path: 'view/:id', name: 'alerts.view', component: page('alerts/view.vue') },
    { path: ':id', redirect: { name: 'alerts.view' } },
  ] },

  { path: '/search/:search', name: 'search', component: page('search.vue') },


  { path: '/blog',
  component: page('blogs/index.vue'),
  children: [
    { path: '', redirect: { name: 'blogs.all' } },
    { path: 'all', name: 'blogs.all', component: page('blogs/all.vue') },
    { path: 'pending', name: 'blogs.pending', component: page('blogs/pending.vue') },
    { path: 'suspended', name: 'blogs.suspended', component: page('blogs/suspended.vue') },
    { path: 'published', name: 'blogs.published', component: page('blogs/published.vue') },
    { path: 'new', name: 'blogs.new', component: page('blogs/new.vue') },
    { path: 'v/:id', name: 'blogs.view', component: page('blogs/view.vue') },
  ] },

  { path: '/chat/i', name: 'chat', component: page('chat/index.vue') },
  { path: '/chat/l', name: 'chat.l', component: page('chat/listen.vue') },


  { path: '*', component: page('errors/404.vue') }
]
