// Service Worker for Hotel Management System
const CACHE_NAME = 'hotel-v1.0.0';
const urlsToCache = [
  '/',
  '/home',
  '/our_rooms',
  '/contact_us',
  '/about_us',
  '/css/bootstrap.min.css',
  '/css/style.css',
  '/css/responsive.css',
  '/js/jquery.min.js',
  '/js/bootstrap.bundle.min.js',
  '/js/custom.js',
  '/images/fevicon.png'
];

// Install service worker
self.addEventListener('install', function(event) {
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then(function(cache) {
        console.log('Cache opened');
        return cache.addAll(urlsToCache);
      })
  );
});

// Fetch event
self.addEventListener('fetch', function(event) {
  event.respondWith(
    caches.match(event.request)
      .then(function(response) {
        // Return cached version or fetch from network
        return response || fetch(event.request);
      }
    )
  );
});

// Activate service worker
self.addEventListener('activate', function(event) {
  event.waitUntil(
    caches.keys().then(function(cacheNames) {
      return Promise.all(
        cacheNames.map(function(cacheName) {
          if (cacheName !== CACHE_NAME) {
            console.log('Deleting old cache:', cacheName);
            return caches.delete(cacheName);
          }
        })
      );
    })
  );
});
