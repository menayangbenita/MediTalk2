"use strict";
var KTSigninGeneral = (function () {
    var t, e, r;
    return {
        init: function () {
            (t = document.querySelector("#kt_sign_in_form")),
                (e = document.querySelector("#kt_sign_in_submit")),
                console.log(e.closest("form").getAttribute("action"));
                (r = FormValidation.formValidation(t, {
                    fields: {
                        email: {
                            validators: {
                                regexp: {
                                    regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                                    message:
                                        "Masukkan email yang valid",
                                },
                                notEmpty: {
                                    message: "Alamat email wajib diisi",
                                },
                            },
                        },
                        password: {
                            validators: {
                                notEmpty: {
                                    message: "Kata sandi wajib diisi",
                                },
                            },
                        },
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".fv-row",
                            eleInvalidClass: "",
                            eleValidClass: "",
                        }),
                    },
                })),
                !(function (t) {
                    try {
                        return new URL(t), !0;
                    } catch (t) {
                        return !1;
                    }
                })(e.closest("form").getAttribute("action"))
                    ? e.addEventListener("click", function (i) {
                          i.preventDefault(),
                              r.validate().then(function (r) {
                                  "Valid" == r
                                      ? (e.setAttribute(
                                            "data-kt-indicator",
                                            "on"
                                        ),
                                        (e.disabled = !0),
                                        setTimeout(function () {
                                            e.removeAttribute(
                                                "data-kt-indicator"
                                            ),
                                                (e.disabled = !1),
                                                Swal.fire({
                                                    text: "Anda telah berhasil masuk!",
                                                    icon: "success",
                                                    buttonsStyling: !1,
                                                    confirmButtonText:
                                                        "Oke, mengerti!",
                                                    customClass: {
                                                        confirmButton:
                                                            "btn btn-primary",
                                                    },
                                                }).then(function (e) {
                                                    if (e.isConfirmed) {
                                                        (t.querySelector(
                                                            '[name="email"]'
                                                        ).value = ""),
                                                            (t.querySelector(
                                                                '[name="password"]'
                                                            ).value = "");
                                                        var r = t.getAttribute(
                                                            "data-kt-redirect-url"
                                                        );
                                                        r &&
                                                            (location.href = r);
                                                    }
                                                });
                                        }, 2e3))
                                      : Swal.fire({
                                            text: "Maaf, sepertinya ada beberapa kesalahan yang terdeteksi, silakan coba lagi.",
                                            icon: "error",
                                            buttonsStyling: !1,
                                            confirmButtonText: "Oke, mengerti!",
                                            customClass: {
                                                confirmButton:
                                                    "btn btn-primary",
                                            },
                                        });
                              });
                      })
                    : e.addEventListener("click", function (i) {
                          i.preventDefault(),
                              r.validate().then(function (r) {
                                  "Valid" == r
                                      ? (e.setAttribute(
                                            "data-kt-indicator",
                                            "on"
                                        ),
                                        (e.disabled = !0),
                                        axios
                                            .post(
                                                e
                                                    .closest("form")
                                                    .getAttribute("action"),
                                                new FormData(t)
                                            )
                                            .then(function (e) {
                                                if (e) {
                                                    t.reset(),
                                                        Swal.fire({
                                                            text: "Anda telah berhasil masuk!",
                                                            icon: "success",
                                                            buttonsStyling: !1,
                                                            confirmButtonText:
                                                                "Oke, mengerti!",
                                                            customClass: {
                                                                confirmButton:
                                                                    "btn btn-primary",
                                                            },
                                                        });
                                                    const e = t.getAttribute(
                                                        "data-kt-redirect-url"
                                                    );
                                                    e && (location.href = e);
                                                } else Swal.fire({ text: "Maaf, email atau kata sandi salah, mohon coba lagi.", icon: "error", buttonsStyling: !1, confirmButtonText: "Oke, mengerti!", customClass: { confirmButton: "btn btn-primary" } });
                                            })
                                            .catch(function (t) {
                                                Swal.fire({
                                                    text: "Maaaaaaaaaaaaaaf, sepertinya ada beberapa kesalahan yang terdeteksi, silakan coba lagi.",
                                                    icon: "error",
                                                    buttonsStyling: !1,
                                                    confirmButtonText:
                                                        "Oke, mengerti!",
                                                    customClass: {
                                                        confirmButton:
                                                            "btn btn-primary",
                                                    },
                                                });
                                            })
                                            .then(() => {
                                                e.removeAttribute(
                                                    "data-kt-indicator"
                                                ),
                                                    (e.disabled = !1);
                                            }))
                                      : Swal.fire({
                                            text: "Maaf, sepertinya ada beberapa kesalahan yang terdeteksi, silakan coba lagi.",
                                            icon: "error",
                                            buttonsStyling: !1,
                                            confirmButtonText: "Oke, mengerti!",
                                            customClass: {
                                                confirmButton:
                                                    "btn btn-primary",
                                            },
                                        });
                              });
                      });
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTSigninGeneral.init();
});
