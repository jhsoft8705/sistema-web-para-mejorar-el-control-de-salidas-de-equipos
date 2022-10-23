document.addEventListener("DOMContentLoaded", function () {
  eventListeners();
});

function eventListeners() {
  const clickRadio = document.querySelectorAll(".cont-check-list input");
  clickRadio[0].addEventListener("click", mostrarFormulario0);
  clickRadio[1].addEventListener("click", mostrarFormulario1);
  clickRadio[2].addEventListener("click", mostrarFormulario2);
  clickRadio[3].addEventListener("click", mostrarFormulario3);
  clickRadio[4].addEventListener("click", mostrarFormulario4);

  /*******************************************************************************/

  const clickGuiaOficina = document.querySelector(".check-guia-oficina input");
  clickGuiaOficina.addEventListener("click", mostrarGuiaOficina);

  const clickGuiaComida = document.querySelector(".check-guia-comida input");
  clickGuiaComida.addEventListener("click", mostrarGuiaComida);

  const clickGuiaEnvios = document.querySelector(".check-guia-envios input");
  clickGuiaEnvios.addEventListener("click", mostrarGuiaEnvios);

  const clickGuiaOtros = document.querySelector(".check-guia-otros input");
  clickGuiaOtros.addEventListener("click", mostrarGuiaOtros);
}

/*Activa los Formularios al hacer Click en el radio*/
function mostrarFormulario0() {
  const form = document.querySelectorAll("FORM");

  if (form[0].classList.contains("inactivo")) {
    form[0].classList.remove("inactivo");
    form[0].classList.add("activo");

    form[1].classList.remove("activo");
    form[2].classList.remove("activo");
    form[3].classList.remove("activo");
    form[4].classList.remove("activo");

    form[1].classList.add("inactivo");
    form[2].classList.add("inactivo");
    form[3].classList.add("inactivo");
    form[4].classList.add("inactivo");
  }
}
function mostrarFormulario1() {
  const form = document.querySelectorAll("FORM");
  if (form[1].classList.contains("inactivo")) {
    form[1].classList.remove("inactivo");
    form[1].classList.add("activo");

    form[0].classList.remove("activo");
    form[2].classList.remove("activo");
    form[3].classList.remove("activo");
    form[4].classList.remove("activo");

    form[0].classList.add("inactivo");
    form[2].classList.add("inactivo");
    form[3].classList.add("inactivo");
    form[4].classList.add("inactivo");
  }
}
function mostrarFormulario2() {
  const form = document.querySelectorAll("FORM");
  if (form[2].classList.contains("inactivo")) {
    form[2].classList.remove("inactivo");
    form[2].classList.add("activo");

    form[0].classList.remove("activo");
    form[1].classList.remove("activo");
    form[3].classList.remove("activo");
    form[4].classList.remove("activo");

    form[0].classList.add("inactivo");
    form[1].classList.add("inactivo");
    form[3].classList.add("inactivo");
    form[4].classList.add("inactivo");
  }
}
function mostrarFormulario3() {
  const form = document.querySelectorAll("FORM");
  if (form[3].classList.contains("inactivo")) {
    form[3].classList.remove("inactivo");
    form[3].classList.add("activo");

    form[0].classList.remove("activo");
    form[1].classList.remove("activo");
    form[2].classList.remove("activo");
    form[4].classList.remove("activo");

    form[0].classList.add("inactivo");
    form[1].classList.add("inactivo");
    form[2].classList.add("inactivo");
    form[4].classList.add("inactivo");
  }
}
function mostrarFormulario4() {
  const form = document.querySelectorAll("FORM");
  if (form[4].classList.contains("inactivo")) {
    form[4].classList.remove("inactivo");
    form[4].classList.add("activo");

    form[0].classList.remove("activo");
    form[1].classList.remove("activo");
    form[2].classList.remove("activo");
    form[3].classList.remove("activo");

    form[0].classList.add("inactivo");
    form[1].classList.add("inactivo");
    form[2].classList.add("inactivo");
    form[3].classList.add("inactivo");
  }
}

/*sirve para ativar y desactivar los campos que mostrara el checklist*/

function mostrarGuiaOficina() {
  const guiaOficina = document.querySelector(".cont-guia-oficina");
  guiaOficina.classList.toggle("inactivo");
}

function mostrarGuiaComida() {
  const guiaComida = document.querySelector(".cont-guia-comida");
  guiaComida.classList.toggle("inactivo");
}

function mostrarGuiaEnvios() {
  const guiaComida = document.querySelector(".cont-guia-envios");
  guiaComida.classList.toggle("inactivo");
}
function mostrarGuiaOtros() {
  const txt_guia = document.getElementById("caja_guia");
  console.log(txt_guia);
  const file_guia = document.getElementById("file_guia");
  const clickGuiaArt = document.querySelector(".check-guia-otros input");
  if (clickGuiaArt.checked == true) {
    txt_guia.disabled = false;
    file_guia.disabled = false;
  } else {
    txt_guia.disabled = true;
    file_guia.disabled = true;
    txt_guia.value = "";
  }
}

/*! modernizr 3.6.0 (Custom Build) | MIT *
 * https://modernizr.com/download/?-webp-setclasses !*/
!(function (e, n, A) {
  function o(e, n) {
    return typeof e === n;
  }
  function t() {
    var e, n, A, t, a, i, l;
    for (var f in r)
      if (r.hasOwnProperty(f)) {
        if (
          ((e = []),
          (n = r[f]),
          n.name &&
            (e.push(n.name.toLowerCase()),
            n.options && n.options.aliases && n.options.aliases.length))
        )
          for (A = 0; A < n.options.aliases.length; A++)
            e.push(n.options.aliases[A].toLowerCase());
        for (t = o(n.fn, "function") ? n.fn() : n.fn, a = 0; a < e.length; a++)
          (i = e[a]),
            (l = i.split(".")),
            1 === l.length
              ? (Modernizr[l[0]] = t)
              : (!Modernizr[l[0]] ||
                  Modernizr[l[0]] instanceof Boolean ||
                  (Modernizr[l[0]] = new Boolean(Modernizr[l[0]])),
                (Modernizr[l[0]][l[1]] = t)),
            s.push((t ? "" : "no-") + l.join("-"));
      }
  }
  function a(e) {
    var n = u.className,
      A = Modernizr._config.classPrefix || "";
    if ((c && (n = n.baseVal), Modernizr._config.enableJSClass)) {
      var o = new RegExp("(^|\\s)" + A + "no-js(\\s|$)");
      n = n.replace(o, "$1" + A + "js$2");
    }
    Modernizr._config.enableClasses &&
      ((n += " " + A + e.join(" " + A)),
      c ? (u.className.baseVal = n) : (u.className = n));
  }
  function i(e, n) {
    if ("object" == typeof e) for (var A in e) f(e, A) && i(A, e[A]);
    else {
      e = e.toLowerCase();
      var o = e.split("."),
        t = Modernizr[o[0]];
      if ((2 == o.length && (t = t[o[1]]), "undefined" != typeof t))
        return Modernizr;
      (n = "function" == typeof n ? n() : n),
        1 == o.length
          ? (Modernizr[o[0]] = n)
          : (!Modernizr[o[0]] ||
              Modernizr[o[0]] instanceof Boolean ||
              (Modernizr[o[0]] = new Boolean(Modernizr[o[0]])),
            (Modernizr[o[0]][o[1]] = n)),
        a([(n && 0 != n ? "" : "no-") + o.join("-")]),
        Modernizr._trigger(e, n);
    }
    return Modernizr;
  }
  var s = [],
    r = [],
    l = {
      _version: "3.6.0",
      _config: {
        classPrefix: "",
        enableClasses: !0,
        enableJSClass: !0,
        usePrefixes: !0,
      },
      _q: [],
      on: function (e, n) {
        var A = this;
        setTimeout(function () {
          n(A[e]);
        }, 0);
      },
      addTest: function (e, n, A) {
        r.push({ name: e, fn: n, options: A });
      },
      addAsyncTest: function (e) {
        r.push({ name: null, fn: e });
      },
    },
    Modernizr = function () {};
  (Modernizr.prototype = l), (Modernizr = new Modernizr());
  var f,
    u = n.documentElement,
    c = "svg" === u.nodeName.toLowerCase();
  !(function () {
    var e = {}.hasOwnProperty;
    f =
      o(e, "undefined") || o(e.call, "undefined")
        ? function (e, n) {
            return n in e && o(e.constructor.prototype[n], "undefined");
          }
        : function (n, A) {
            return e.call(n, A);
          };
  })(),
    (l._l = {}),
    (l.on = function (e, n) {
      this._l[e] || (this._l[e] = []),
        this._l[e].push(n),
        Modernizr.hasOwnProperty(e) &&
          setTimeout(function () {
            Modernizr._trigger(e, Modernizr[e]);
          }, 0);
    }),
    (l._trigger = function (e, n) {
      if (this._l[e]) {
        var A = this._l[e];
        setTimeout(function () {
          var e, o;
          for (e = 0; e < A.length; e++) (o = A[e])(n);
        }, 0),
          delete this._l[e];
      }
    }),
    Modernizr._q.push(function () {
      l.addTest = i;
    }),
    Modernizr.addAsyncTest(function () {
      function e(e, n, A) {
        function o(n) {
          var o = n && "load" === n.type ? 1 == t.width : !1,
            a = "webp" === e;
          i(e, a && o ? new Boolean(o) : o), A && A(n);
        }
        var t = new Image();
        (t.onerror = o), (t.onload = o), (t.src = n);
      }
      var n = [
          {
            uri: "data:image/webp;base64,UklGRiQAAABXRUJQVlA4IBgAAAAwAQCdASoBAAEAAwA0JaQAA3AA/vuUAAA=",
            name: "webp",
          },
          {
            uri: "data:image/webp;base64,UklGRkoAAABXRUJQVlA4WAoAAAAQAAAAAAAAAAAAQUxQSAwAAAABBxAR/Q9ERP8DAABWUDggGAAAADABAJ0BKgEAAQADADQlpAADcAD++/1QAA==",
            name: "webp.alpha",
          },
          {
            uri: "data:image/webp;base64,UklGRlIAAABXRUJQVlA4WAoAAAASAAAAAAAAAAAAQU5JTQYAAAD/////AABBTk1GJgAAAAAAAAAAAAAAAAAAAGQAAABWUDhMDQAAAC8AAAAQBxAREYiI/gcA",
            name: "webp.animation",
          },
          {
            uri: "data:image/webp;base64,UklGRh4AAABXRUJQVlA4TBEAAAAvAAAAAAfQ//73v/+BiOh/AAA=",
            name: "webp.lossless",
          },
        ],
        A = n.shift();
      e(A.name, A.uri, function (A) {
        if (A && "load" === A.type)
          for (var o = 0; o < n.length; o++) e(n[o].name, n[o].uri);
      });
    }),
    t(),
    a(s),
    delete l.addTest,
    delete l.addAsyncTest;
  for (var p = 0; p < Modernizr._q.length; p++) Modernizr._q[p]();
  e.Modernizr = Modernizr;
})(window, document);
