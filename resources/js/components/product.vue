<template>
  <div class="container" id="product-page">
    <div class="row justify-content-center pb-3">
      <div class="col-xs-12 col-sm-12">
        <div class="card border-light">
          <div class="card-body row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
              <div class="border-wrap-container">
                <img
                  class="card-img-top rounded mx-auto d-block"
                  style="max-width: 24rem; max-height: 100%;"
                  src="/images/product-01.jpeg"
                  alt="Magic Potion"
                />
              </div>
            </div>

            <div class="card-header col-xs-12 col-sm-12 col-md-6 col-lg-5">
              <h2 class="text-center">
                {{ product.name }}
              </h2>

              <p>
                Ut rutrum nibh eu elementum luctus. Vestibulum id arcu non nisi
                vulputate eleifend id egestas justo. Ut pulvinar congue
                consectetur. Praesent sed malesuada ante, non ultricies est.
                Curabitur a enim sed dui varius sagittis.
              </p>
              <p>
                Proin rhoncus ac tellus aliquam sodales. Donec varius cursus
                elementum. Suspendisse varius arcu a enim vulputate pharetra et
                at enim. Pellentesque non ipsum malesuada, hendrerit libero nec,
                bibendum eros. Integer nec leo sed metus ultricies suscipit.
                Maecenas congue ex erat, vitae efficitur nunc varius id.
              </p>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
              <label for="total" class="mt-4">Total</label>
              <input
                type="text"
                v-model="form.total"
                class="form-control"
                placeholder="$49.99"
                readonly
                id="total"
              />
            </div>
          </div>
        </div>
      </div>
    </div>

    <ValidationObserver v-slot="{ handleSubmit, reset }" ref="form">
      <form @submit.prevent="handleSubmit(submitForm)">
        <label for="quantity">Qty*</label>
        <ValidationProvider
          rules="required|integer"
          v-slot="{ classes, errors }"
        >
          <select
            v-model.number="form.quantity"
            class="form-control"
            id="quantity"
            @change="calculateTotal($event.target.value)"
          >
            <option disabled value="">Please select</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
          </select>
          <div class="control" :class="classes">
            <span>{{ errors[0] }}</span>
          </div>
        </ValidationProvider>

        <hr class="mb-4" />
        <div class="row">
          <h2 class="col-md-12">Contact</h2>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="first_name">First Name</label>
            <ValidationProvider rules="required" v-slot="{ classes, errors }">
              <input
                type="text"
                v-model.trim="form.first_name"
                class="form-control"
                id="first_name"
                placeholder="First name"
              />
              <div class="control" :class="classes">
                <span>{{ errors[0] }}</span>
              </div>
            </ValidationProvider>
          </div>
          <div class="form-group col-md-6">
            <label for="last_name">Last Name</label>
            <ValidationProvider rules="required" v-slot="{ classes, errors }">
              <input
                type="text"
                v-model.trim="form.last_name"
                class="form-control"
                id="last_name"
                placeholder="Last name"
              />
              <div class="control" :class="classes">
                <span>{{ errors[0] }}</span>
              </div>
            </ValidationProvider>
          </div>

          <div class="form-group col-md-6">
            <label for="email">Email</label>
            <ValidationProvider
              name="email"
              rules="required|email"
              v-slot="{ classes, errors }"
            >
              <input
                type="email"
                v-model.trim="form.email"
                class="form-control"
                id="email"
                placeholder="Email"
              />
              <div class="control" :class="classes">
                <span>{{ errors[0] }}</span>
              </div>
            </ValidationProvider>
          </div>

          <div class="form-group col-md-6">
            <ValidationProvider rules="required" v-slot="{ classes, errors }">
              <label for="phone">Phone Number</label>
              <input
                type="tel"
                v-model.trim="form.phone"
                class="form-control"
                id="phone"
                placeholder="Phone number"
                maxlength="10"
              />
              <div class="control" :class="classes">
                <span>{{ errors[0] }}</span>
              </div>
            </ValidationProvider>
          </div>
        </div>

        <div class="form-group">
          <ValidationProvider rules="required" v-slot="{ classes, errors }">
            <label for="address_street1">Address</label>
            <input
              type="text"
              v-model.trim="form.address_street1"
              class="form-control"
              id="address_street1"
              placeholder="1234 Main St"
            />
            <div class="control" :class="classes">
              <span>{{ errors[0] }}</span>
            </div>
          </ValidationProvider>
        </div>

        <div class="form-group">
          <label for="address_street2">Address 2</label>
          <input
            type="text"
            v-model.trim="form.address_street2"
            class="form-control"
            id="address_street2"
            placeholder="Apartment, studio, or floor"
          />
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="address_city">City</label>
            <ValidationProvider rules="required" v-slot="{ classes, errors }">
              <input
                type="text"
                v-model.trim="form.address_city"
                class="form-control"
                id="address_city"
              />
              <div class="control" :class="classes">
                <span>{{ errors[0] }}</span>
              </div>
            </ValidationProvider>
          </div>

          <div class="form-group col-md-4">
            <label for="address_state">State</label>
            <ValidationProvider rules="required" v-slot="{ classes, errors }">
              <select
                v-model.trim="form.address_state"
                id="address_state"
                class="form-control"
              >
                <option selected>Choose...</option>
                <option value="AL">Alabama</option>
                <option value="AK">Alaska</option>
                <option value="AZ">Arizona</option>
                <option value="AR">Arkansas</option>
                <option value="CA">California</option>
                <option value="CO">Colorado</option>
                <option value="CT">Connecticut</option>
                <option value="DE">Delaware</option>
                <option value="FL">Florida</option>
                <option value="GA">Georgia</option>
                <option value="HI">Hawaii</option>
                <option value="ID">Idaho</option>
                <option value="IL">Illinois</option>
                <option value="IN">Indiana</option>
                <option value="IA">Iowa</option>
                <option value="KS">Kansas</option>
                <option value="KY">Kentucky</option>
                <option value="LA">Louisiana</option>
                <option value="ME">Maine</option>
                <option value="MD">Maryland</option>
                <option value="MA">Massachusetts</option>
                <option value="MI">Michigan</option>
                <option value="MN">Minnesota</option>
                <option value="MS">Mississippi</option>
                <option value="MO">Missouri</option>
                <option value="MT">Montana</option>
                <option value="NE">Nebraska</option>
                <option value="NV">Nevada</option>
                <option value="NH">New Hampshire</option>
                <option value="NJ">New Jersey</option>
                <option value="NM">New Mexico</option>
                <option value="NY">New York</option>
                <option value="NC">North Carolina</option>
                <option value="ND">North Dakota</option>
                <option value="OH">Ohio</option>
                <option value="OK">Oklahoma</option>
                <option value="OR">Oregon</option>
                <option value="PA">Pennsylvania</option>
                <option value="RI">Rhode Island</option>
                <option value="SC">South Carolina</option>
                <option value="SD">South Dakota</option>
                <option value="TN">Tennessee</option>
                <option value="TX">Texas</option>
                <option value="UT">Utah</option>
                <option value="VT">Vermont</option>
                <option value="VA">Virginia</option>
                <option value="WA">Washington</option>
                <option value="WV">West Virginia</option>
                <option value="WI">Wisconsin</option>
                <option value="WY">Wyoming</option>
              </select>
              <div class="control" :class="classes">
                <span>{{ errors[0] }}</span>
              </div>
            </ValidationProvider>
          </div>

          <div class="form-group col-md-2">
            <label for="address_zip">Zip</label>
            <ValidationProvider rules="required" v-slot="{ classes, errors }">
              <input
                type="text"
                v-model.trim="form.address_zip"
                class="form-control"
                id="address_zip"
                maxlength="5"
              />
              <div class="control" :class="classes">
                <span>{{ errors[0] }}</span>
              </div>
            </ValidationProvider>
          </div>
        </div>

        <hr class="mb-4" />

        <div class="row">
          <h2 class="col-md-12">Billing Information</h2>
        </div>

        <div class="form-row">
          <div class="col-md-4">
            <label for="payment_credit_card_number">Credit card number</label>
            <ValidationProvider rules="required" v-slot="{ classes, errors }">
              <input
                type="text"
                v-model.trim="form.payment_credit_card_number"
                class="form-control"
                id="payment_credit_card_number"
              />
              <div class="control" :class="classes">
                <span>{{ errors[0] }}</span>
              </div>
            </ValidationProvider>
          </div>

          <div class="col-md-2">
            <label for="payment_credit_card_expiration">Expiration</label>
            <ValidationProvider rules="required" v-slot="{ classes, errors }">
              <input
                type="date"
                v-model.trim="form.payment_credit_card_expiration"
                class="form-control"
                id="payment_credit_card_expiration"
              />
              <div class="control" :class="classes">
                <span>{{ errors[0] }}</span>
              </div>
            </ValidationProvider>
          </div>
        </div>

        <hr class="mb-4" />
        <div class="form-group pb-4 pt-3">
          <button
            v-if="submitting"
            class="btn btn-lg btn-block float-right"
            disabled
          >
            Submitting...
          </button>
          <button v-else type="submit" class="btn btn-lg btn-block float-right">
            Submit
          </button>
        </div>
      </form>
    </ValidationObserver>

    <footer class="row text-center">
      <p class="col-md-12 pt-5">
        © 2020 Magic Potion
      </p>
    </footer>
  </div>
</template>

<script>
import {
  ValidationProvider,
  ValidationObserver,
  extend,
  validate,
} from 'vee-validate';
import { required, email, integer } from 'vee-validate/dist/rules';

extend('email', email);
extend('integer', integer);

extend('required', {
  ...required,
  message: 'This field is required',
});

export default {
  components: {
    ValidationProvider,
    ValidationObserver,
  },

  data() {
    return {
      form: {
        first_name: '',
        last_name: '',
        email: '',
        phone: '',
        address_street1: '',
        address_street2: '',
        address_city: '',
        address_state: '',
        address_zip: '',
        payment_credit_card_number: '',
        payment_credit_card_expiration: '',
        quantity: '',
        total: '',
        order_date: new Date(),
        fulfilled: false,
      },

      product: {
        id: 1,
        name: 'Magic Potion #1',
        price: 49.99,
      },

      submitting: false,
    };
  },

  methods: {
    calculateTotal(quantity = 1, price = this.product.price) {
      this.form.total = (quantity * price).toFixed(2);
    },

    clearForm() {
      this.form.first_name = '';
      this.form.last_name = '';
      this.form.email = '';
      this.form.phone = '';
      this.form.address_street1 = '';
      this.form.address_street2 = '';
      this.form.address_city = '';
      this.form.address_state = '';
      this.form.address_zip = '';
      this.form.payment_credit_card_number = '';
      this.form.payment_credit_card_expiration = '';
      this.form.quantity = '';
      this.form.total = '';
    },

    submitForm() {
      this.submitting = true;
      axios
        .post('api/magic', this.form)
        .then(response => {
          window.alert('Your order has been placed!');
          this.clearForm();
          this.$refs.form.reset();
        })
        .catch(error => {
          console.error(error);
          window.alert(`${error.response.data.error}`);
        })
        .finally(() => {
          this.submitting = false;
        });
    },
  },
};
</script>

<style lang="scss" scoped>
$purple: #332e54;
$light-purple: rgb(82, 77, 110);
$orange: #ff5e4d;
$off-white: #f8f8fa;

#product-page {
  button {
    background-color: $purple;
    color: $off-white;

    &:hover {
      background-color: $light-purple;
    }
  }

  h2 {
    font-weight: 700;
  }

  .border-wrap-container {
    padding: 1rem;
    position: relative;
    background: linear-gradient(to right, $orange, $purple);
  }
  .card-header {
    border-bottom: 0;
    padding: 2rem;
  }

  .control {
    width: 100%;
    span {
      display: block;
    }
    input {
      padding: 5px 10px;
    }

    &.invalid {
      input,
      span {
        color: #eb0600;
      }

      input {
        border: 1px #eb0600 solid;
      }
    }

    &.valid {
      input,
      span {
        color: #045929;
      }
      input {
        border: 1px #045929 solid;
      }
    }
  }
}
</style>
