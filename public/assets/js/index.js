const API_URL = window.location.origin;

const makeFormData = (formEl) => {
    const inputs = formEl.querySelectorAll('input');
    const textareas = formEl.querySelectorAll('textarea');

    const formData = new FormData();

    for(const input of inputs) {
        formData.append(input.name, input.value);
    }

    for(const textarea of textareas) {
        formData.append(textarea.name, textarea.value);
    }

    return formData;
}

const Request = {
  get(url, config = {}) {
      return fetch(API_URL + url, {
          method: "GET",
          headers: {
              "Accept": "application/json",
              "Content-Type": "application/json",
          },
          ...config
      });
  },

  post(url, body, config = {}) {
      return fetch(API_URL + url, {
          method: "POST",
          headers: {
              "Accept": "application/json"
          },
          body: body,
          ...config
      });
  }
};

const createOrder = (formEl) => {
    const button = formEl.querySelector('button');

    button.addEventListener('click', (e) => {
       e.preventDefault();

       Request.post('/cart/create/order', makeFormData(formEl))
           .then((r) => r.json())
           .then((data) => {
               if(data.status) {
                   return window.location.href = data.redirect_url;
               }
               alert(data.message);
           })
    });
}

const cart = (container) => {
    const items = container.querySelectorAll('.cart-item');

    const removeCartItem = (e, item) => {
        e.preventDefault();

        const isAccepted = confirm('Вы действительно хотите удалить товар из корзины?');

        if(!isAccepted) return false;

        // Без перезагрузки страницы (ассинхронно)
        fetch(e.currentTarget.href).then((r) => {
            if(r.ok) {
                return item.remove();
            }
            alert('Ошибка при удалении товара из корзины')
        });

        // window.location.href = e.currentTarget.href;
    }

    items.forEach((item) => {
        const removeButton = item.querySelector('a.button');

        removeButton.addEventListener('click', (e) => removeCartItem(e, item));
    })

}

const init = () => {

    const checkoutFormEl = document.getElementById('js-checkout');

    if (checkoutFormEl) {
        createOrder(checkoutFormEl);
    }

    const cartElement = document.querySelector('.cart-section');

    if(cartElement) {
        cart(cartElement);
    }
}


document.addEventListener('DOMContentLoaded', init);
