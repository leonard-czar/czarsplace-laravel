/**
 * Usage: CzarsToast.show('Message', 'success' | 'error' | 'warning' | 'info', durationMs);
 */
(function () {
  'use strict';

  var DEFAULT_DURATION = 5000;
  var container = null;

  function ensureContainer() {
    if (!container) {
      container = document.createElement('div');
      container.className = 'czars-toast-container';
      container.setAttribute('aria-live', 'polite');
      document.body.appendChild(container);
    }
    return container;
  }

  function normalizeType(type) {
    var t = (type || 'info').toLowerCase();
    if (t === 'message') {
      return 'info';
    }
    if (['success', 'error', 'warning', 'info'].indexOf(t) === -1) {
      return 'info';
    }
    return t;
  }

  function removeToast(el) {
    if (!el || !el.parentNode) {
      return;
    }
    el.classList.remove('czars-toast--in');
    el.classList.add('czars-toast--out');
    window.setTimeout(function () {
      if (el.parentNode) {
        el.parentNode.removeChild(el);
      }
    }, 300);
  }

  function show(message, type, duration) {
    var msg = message == null ? '' : String(message);
    var kind = normalizeType(type);
    var ms = duration == null ? DEFAULT_DURATION : Number(duration);

    var c = ensureContainer();
    var toast = document.createElement('div');
    toast.className = 'czars-toast czars-toast--' + kind;
    toast.setAttribute('role', 'alert');

    var text = document.createElement('span');
    text.className = 'czars-toast__text';
    text.textContent = msg;

    var close = document.createElement('button');
    close.type = 'button';
    close.className = 'czars-toast__close';
    close.setAttribute('aria-label', 'Dismiss');
    close.innerHTML = '\u00D7';
    close.addEventListener('click', function () {
      removeToast(toast);
    });

    toast.appendChild(text);
    toast.appendChild(close);
    c.appendChild(toast);

    window.requestAnimationFrame(function () {
      toast.classList.add('czars-toast--in');
    });

    if (ms > 0) {
      window.setTimeout(function () {
        removeToast(toast);
      }, ms);
    }
  }

  window.CzarsToast = { show: show };
})();
