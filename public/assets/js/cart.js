// ===============================
// تحميل بيانات السلة
// ===============================

function loadCart() {

    fetch("/cart/data")
        .then(res => res.json())
        .then(data => {

            // العداد
            const badge = document.getElementById("cart-badge");

            if (badge) {

                badge.innerHTML = data.count;

                if (data.count > 0) {
                    badge.classList.remove("d-none");
                } else {
                    badge.classList.add("d-none");
                }
            }

            // الإجمالي
            const total = document.getElementById("cart-total");

            if (total) {
                total.innerHTML = Number(data.total).toFixed(2) + " ج.م";
            }

            // المنتجات
            const cartItems = document.getElementById("cart-items");

            if (!cartItems) return;

            let html = "";

            if (data.items.length === 0) {

                html = `
                    <div class="text-center py-5">
                        <i class="bi bi-cart-x fs-1 text-secondary mb-3"></i>
                        <h5>السلة فارغة</h5>
                        <small class="text-muted">
                            لم تقم بإضافة أي منتجات بعد
                        </small>
                    </div>
                `;

            } else {

                data.items.forEach(item => {

                    html += `
                        <div class="cart-item">

                            <img src="/uploads/${item.image}" alt="${item.name}">

                            <div class="cart-item-info">

                                <div class="cart-item-title">
                                    ${item.name}
                                </div>

                                <div class="cart-price">
                                    ${Number(item.price).toFixed(2)} ج.م
                                </div>

                                <div class="d-flex align-items-center gap-2 mt-2">

                                    <button class="btn btn-sm btn-light decrease"
                                            data-id="${item.id}">
                                        -
                                    </button>

                                    <strong>${item.quantity}</strong>

                                    <button class="btn btn-sm btn-light increase"
                                            data-id="${item.id}">
                                        +
                                    </button>

                                    <button class="btn btn-sm btn-danger ms-auto remove"
                                            data-id="${item.id}">
                                        <i class="bi bi-trash"></i>
                                    </button>

                                </div>

                            </div>

                        </div>
                    `;

                });

            }

            cartItems.innerHTML = html;

        });

}



// ===============================
// تحديث السلة
// ===============================

function updateCart(url, method) {

    fetch(url, {

        method: method,

        headers: {
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .content,

            "Accept": "application/json"
        }

    })
    .then(res => res.json())
    .then(() => {

        loadCart();

    });

}



// ===============================
// إضافة منتج
// ===============================
document.querySelectorAll(".add-to-cart").forEach(button => {

    button.addEventListener("click", function () {

        let id = this.dataset.id;

        // حفظ الزر الحالي
        const btn = this;

        // أثناء الإضافة
        btn.disabled = true;

        btn.innerHTML = `
            <span class="spinner-border spinner-border-sm"></span>
            جاري الإضافة...
        `;

        fetch("/cart/add/" + id, {

            method: "POST",

            headers: {

                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .content,

                "Accept": "application/json"

            }

        })
        .then(res => res.json())
        .then(() => {

            loadCart();

            const offcanvas = new bootstrap.Offcanvas(
                document.getElementById("cartOffcanvas")
            );

            offcanvas.show();

            // رجوع الزر لطبيعته
            btn.disabled = false;

            btn.innerHTML = `
                <i class="fas fa-shopping-cart"></i>
                أضف إلى السلة
            `;
showToast();

        })
        
        .catch(() => {

            // في حالة حدوث خطأ
            btn.disabled = false;

            btn.innerHTML = `
                <i class="fas fa-shopping-cart"></i>
                أضف إلى السلة
            `;

            alert("حدث خطأ أثناء إضافة المنتج.");

        });

    });

});


// ===============================
// زيادة - تقليل - حذف
// ===============================

document.addEventListener("click", function (e) {

    if (e.target.closest(".increase")) {

        let id = e.target.closest(".increase").dataset.id;

        updateCart("/cart/increase/" + id, "POST");

    }

    if (e.target.closest(".decrease")) {

        let id = e.target.closest(".decrease").dataset.id;

        updateCart("/cart/decrease/" + id, "POST");

    }

    if (e.target.closest(".remove")) {

        let id = e.target.closest(".remove").dataset.id;

        updateCart("/cart/remove/" + id, "DELETE");

    }

});

function showToast() {

    const toastElement = document.getElementById("cartToast");

    if (!toastElement) return;

    const toast = new bootstrap.Toast(toastElement);

    toast.show();

}
// ===============================
// عند فتح الصفحة
// ===============================

loadCart();


