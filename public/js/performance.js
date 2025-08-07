/**
 * Performance Optimized JavaScript for Hotel Management System
 * Includes lazy loading, intersection observers, and performance monitoring
 */

(function () {
     'use strict';

     // Performance monitoring
     const performance = window.performance || {};
     const startTime = performance.now ? performance.now() : Date.now();

     // Utility functions
     const utils = {
          // Debounce function for performance
          debounce: function (func, wait, immediate) {
               let timeout;
               return function executedFunction() {
                    const context = this;
                    const args = arguments;
                    const later = function () {
                         timeout = null;
                         if (!immediate) func.apply(context, args);
                    };
                    const callNow = immediate && !timeout;
                    clearTimeout(timeout);
                    timeout = setTimeout(later, wait);
                    if (callNow) func.apply(context, args);
               };
          },

          // Throttle function for scroll events
          throttle: function (func, limit) {
               let inThrottle;
               return function () {
                    const args = arguments;
                    const context = this;
                    if (!inThrottle) {
                         func.apply(context, args);
                         inThrottle = true;
                         setTimeout(() => inThrottle = false, limit);
                    }
               };
          },

          // Check if element is in viewport
          isInViewport: function (element) {
               const rect = element.getBoundingClientRect();
               return (
                    rect.top >= 0 &&
                    rect.left >= 0 &&
                    rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                    rect.right <= (window.innerWidth || document.documentElement.clientWidth)
               );
          },

          // Get computed style safely
          getStyle: function (element, property) {
               return window.getComputedStyle ? getComputedStyle(element, null).getPropertyValue(property) : element.currentStyle[property];
          }
     };

     // Loader management
     const LoaderManager = {
          element: null,
          timeout: null,

          init: function () {
               this.element = document.querySelector('.loader_bg');
               if (this.element) {
                    this.setupTimeout();
                    this.bindEvents();
               }
          },

          hide: function () {
               if (this.element) {
                    this.element.classList.add('hidden');
                    setTimeout(() => {
                         if (this.element && this.element.parentNode) {
                              this.element.style.display = 'none';
                         }
                    }, 500);
               }
               if (this.timeout) {
                    clearTimeout(this.timeout);
               }
          },

          setupTimeout: function () {
               // Force hide after maximum timeout
               this.timeout = setTimeout(() => {
                    this.hide();
                    console.warn('Loader hidden due to timeout');
               }, 10000);
          },

          bindEvents: function () {
               // Hide loader when page is fully loaded
               if (document.readyState === 'complete') {
                    setTimeout(() => this.hide(), 800);
               } else {
                    window.addEventListener('load', () => {
                         setTimeout(() => this.hide(), 800);
                    });
               }
          }
     };

     // Image lazy loading with intersection observer
     const LazyLoader = {
          observer: null,
          images: [],

          init: function () {
               this.images = document.querySelectorAll('img[data-src], img[loading="lazy"]');

               if ('IntersectionObserver' in window) {
                    this.setupIntersectionObserver();
               } else {
                    this.fallbackLoad();
               }
          },

          setupIntersectionObserver: function () {
               const options = {
                    root: null,
                    rootMargin: '50px',
                    threshold: 0.1
               };

               this.observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                         if (entry.isIntersecting) {
                              this.loadImage(entry.target);
                              this.observer.unobserve(entry.target);
                         }
                    });
               }, options);

               this.images.forEach(img => {
                    this.observer.observe(img);
               });
          },

          loadImage: function (img) {
               const dataSrc = img.getAttribute('data-src');
               if (dataSrc) {
                    img.src = dataSrc;
                    img.removeAttribute('data-src');
               }

               img.addEventListener('load', function () {
                    this.classList.add('loaded');
                    this.style.opacity = '1';
               });

               img.addEventListener('error', function () {
                    console.warn('Failed to load image:', this.src);
                    this.src = 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzAwIiBoZWlnaHQ9IjIwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjZGRkIi8+PHRleHQgeD0iNTAlIiB5PSI1MCUiIGZvbnQtZmFtaWx5PSJBcmlhbCwgc2Fucy1zZXJpZiIgZm9udC1zaXplPSIxOCIgZmlsbD0iIzk5OSIgdGV4dC1hbmNob3I9Im1pZGRsZSIgZHk9Ii4zZW0iPkltYWdlIG5vdCBmb3VuZDwvdGV4dD48L3N2Zz4=';
               });
          },

          fallbackLoad: function () {
               this.images.forEach(img => {
                    this.loadImage(img);
               });
          }
     };

     // Animation on scroll
     const ScrollAnimations = {
          elements: [],
          observer: null,

          init: function () {
               this.elements = document.querySelectorAll('.animate-on-scroll, .lazy-load');

               if ('IntersectionObserver' in window) {
                    this.setupObserver();
               } else {
                    this.fallbackAnimate();
               }
          },

          setupObserver: function () {
               const options = {
                    threshold: 0.1,
                    rootMargin: '0px 0px -50px 0px'
               };

               this.observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                         if (entry.isIntersecting) {
                              this.animateElement(entry.target);
                              this.observer.unobserve(entry.target);
                         }
                    });
               }, options);

               this.elements.forEach(element => {
                    this.observer.observe(element);
               });
          },

          animateElement: function (element) {
               element.classList.add('animated');
               element.classList.add('loaded');
          },

          fallbackAnimate: function () {
               const checkScroll = utils.throttle(() => {
                    this.elements.forEach(element => {
                         if (utils.isInViewport(element)) {
                              this.animateElement(element);
                         }
                    });
               }, 100);

               window.addEventListener('scroll', checkScroll);
               checkScroll(); // Initial check
          }
     };

     // Form enhancements
     const FormEnhancer = {
          forms: [],

          init: function () {
               this.forms = document.querySelectorAll('form');
               this.bindEvents();
          },

          bindEvents: function () {
               this.forms.forEach(form => {
                    // Enhance form inputs
                    const inputs = form.querySelectorAll('input, textarea, select');
                    inputs.forEach(input => {
                         this.enhanceInput(input);
                    });

                    // Add form submission handler
                    form.addEventListener('submit', this.handleSubmit.bind(this));
               });
          },

          enhanceInput: function (input) {
               // Add focus/blur effects
               input.addEventListener('focus', function () {
                    this.parentElement.classList.add('focused');
               });

               input.addEventListener('blur', function () {
                    this.parentElement.classList.remove('focused');
                    if (this.value.trim() !== '') {
                         this.parentElement.classList.add('has-value');
                    } else {
                         this.parentElement.classList.remove('has-value');
                    }
               });

               // Initial state check
               if (input.value.trim() !== '') {
                    input.parentElement.classList.add('has-value');
               }
          },

          handleSubmit: function (event) {
               const form = event.target;
               const submitBtn = form.querySelector('button[type="submit"], input[type="submit"]');

               if (submitBtn) {
                    const originalText = submitBtn.innerHTML || submitBtn.value;
                    const loadingText = submitBtn.dataset.loading || 'Loading...';

                    submitBtn.disabled = true;
                    if (submitBtn.innerHTML !== undefined) {
                         submitBtn.innerHTML = loadingText;
                    } else {
                         submitBtn.value = loadingText;
                    }

                    // Re-enable after timeout if form doesn't redirect
                    setTimeout(() => {
                         submitBtn.disabled = false;
                         if (submitBtn.innerHTML !== undefined) {
                              submitBtn.innerHTML = originalText;
                         } else {
                              submitBtn.value = originalText;
                         }
                    }, 10000);
               }
          }
     };

     // Performance monitoring
     const PerformanceMonitor = {
          metrics: {},

          init: function () {
               this.recordInitialMetrics();
               this.setupNavigationTimingAPI();
               this.bindEvents();
          },

          recordInitialMetrics: function () {
               if (performance.timing) {
                    const timing = performance.timing;
                    this.metrics.domContentLoaded = timing.domContentLoadedEventEnd - timing.navigationStart;
                    this.metrics.pageLoad = timing.loadEventEnd - timing.navigationStart;
               }
          },

          setupNavigationTimingAPI: function () {
               if ('PerformanceObserver' in window) {
                    const observer = new PerformanceObserver((list) => {
                         const entries = list.getEntries();
                         entries.forEach(entry => {
                              if (entry.entryType === 'navigation') {
                                   this.metrics.dns = entry.domainLookupEnd - entry.domainLookupStart;
                                   this.metrics.connection = entry.connectEnd - entry.connectStart;
                                   this.metrics.responseTime = entry.responseEnd - entry.requestStart;
                                   this.metrics.domProcessing = entry.domComplete - entry.domLoading;
                              }
                         });
                    });

                    observer.observe({ entryTypes: ['navigation'] });
               }
          },

          bindEvents: function () {
               window.addEventListener('load', () => {
                    setTimeout(() => {
                         this.logMetrics();
                    }, 1000);
               });
          },

          logMetrics: function () {
               const endTime = performance.now ? performance.now() : Date.now();
               const totalTime = endTime - startTime;

               console.group('🚀 Hotel Management - Performance Metrics');
               console.log('📊 Total Script Execution Time:', Math.round(totalTime) + 'ms');

               if (this.metrics.domContentLoaded) {
                    console.log('⚡ DOM Content Loaded:', this.metrics.domContentLoaded + 'ms');
               }

               if (this.metrics.pageLoad) {
                    console.log('🎯 Page Load Complete:', this.metrics.pageLoad + 'ms');
               }

               if (this.metrics.dns) {
                    console.log('🔍 DNS Lookup:', Math.round(this.metrics.dns) + 'ms');
               }

               if (this.metrics.responseTime) {
                    console.log('📡 Server Response:', Math.round(this.metrics.responseTime) + 'ms');
               }

               console.groupEnd();
          }
     };

     // Error handling
     const ErrorHandler = {
          init: function () {
               window.addEventListener('error', this.handleError.bind(this));
               window.addEventListener('unhandledrejection', this.handlePromiseError.bind(this));
          },

          handleError: function (event) {
               console.error('JavaScript Error:', {
                    message: event.message,
                    filename: event.filename,
                    lineno: event.lineno,
                    colno: event.colno,
                    error: event.error
               });
          },

          handlePromiseError: function (event) {
               console.error('Unhandled Promise Rejection:', event.reason);
          }
     };

     // Service Worker registration
     const ServiceWorkerManager = {
          init: function () {
               if ('serviceWorker' in navigator) {
                    window.addEventListener('load', () => {
                         navigator.serviceWorker.register('/sw.js')
                              .then(registration => {
                                   console.log('✅ Service Worker registered successfully:', registration.scope);
                              })
                              .catch(error => {
                                   console.log('❌ Service Worker registration failed:', error);
                              });
                    });
               }
          }
     };

     // Main initialization
     const HotelApp = {
          init: function () {
               console.log('🏨 Hotel Management System - Initializing...');

               // Initialize all modules
               ErrorHandler.init();
               LoaderManager.init();
               LazyLoader.init();
               ScrollAnimations.init();
               FormEnhancer.init();
               PerformanceMonitor.init();
               ServiceWorkerManager.init();

               console.log('✅ Hotel Management System - Ready!');
          }
     };

     // Start the application when DOM is ready
     if (document.readyState === 'loading') {
          document.addEventListener('DOMContentLoaded', HotelApp.init);
     } else {
          HotelApp.init();
     }

     // Expose utilities to global scope for debugging
     window.HotelApp = {
          utils: utils,
          modules: {
               LoaderManager,
               LazyLoader,
               ScrollAnimations,
               FormEnhancer,
               PerformanceMonitor
          }
     };

})();
