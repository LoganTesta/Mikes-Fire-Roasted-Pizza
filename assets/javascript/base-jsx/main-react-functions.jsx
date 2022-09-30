
class PizzaOrderContent extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            numberOfPizzasTotal: 0,
            sizeOfPizza: "",
            typeOfPizza: "",
            storePickup: "",
            orderName: "",
            orderEmail: "",
            orderPhone: "",
            orderComments: "",

            orderTotalCost: 0,

            orderTextOutput: "",
            validationFeedbackClientSide: ""
        };
    }

    adjustPizzaOrder = (event) => {
        let nameOfElement = event.target.name;
        let valueProvided = event.target.value;

        if (nameOfElement === "numberOfPizzasTotal") {
            if (!Number(valueProvided)) {
                this.setState({validationFeedbackClientSide: "Please enter a number from 1-10."});
                this.setState({[nameOfElement]: 0});
            } else if (valueProvided > 10) {
                this.setState({validationFeedbackClientSide: "Please call us in advance for orders of more than 10 pizzas."});
                this.setState({[nameOfElement]: 0});
            } else {
                this.setState({[nameOfElement]: valueProvided});
                this.setState({validationFeedbackClientSide: ""});
            }
        } else {
            this.setState({[nameOfElement]: valueProvided});
            this.setState({validationFeedbackClientSide: ""});
        }
    }

    checkValidity = (event) => {
        // event.preventDefault();
        let validOrder = true;

        if (this.state.numberOfPizzasTotal.length < 1) {
            validOrder = false;
        } else if (this.state.sizeOfPizza.length < 1) {
            validOrder = false;
        } else if (this.state.typeOfPizza.length < 1) {
            validOrder = false;
        } else if (this.state.storePickup.length < 1) {
            validOrder = false;
        } else if (this.state.orderName.length < 1) {
            validOrder = false;
        } else if (this.state.orderEmail.length < 6) {
            validOrder = false;
        } else if (this.state.orderPhone.length !== 10) {
            validOrder = false;
        } else if (this.state.numberOfPizzasTotal < 1) {
            validOrder = false;
        } else if (10 < this.state.numberOfPizzasTotal) {
            validOrder = false;
        }

        let atPosition = this.state.orderEmail.indexOf("@");
        let dotPosition = this.state.orderEmail.lastIndexOf(".");
        let lastEmailCharacter = this.state.orderEmail.length - 1;

        if (atPosition <= 0) {
            validOrder = false;
        } else if (atPosition + 1 >= dotPosition) {
            validOrder = false;
        } else if (dotPosition + 1 >= lastEmailCharacter) {
            validOrder = false;
        }


        if (validOrder) {
            document.getElementById("orderPizzaButton").removeAttribute("disabled");
        } else {
            document.getElementById("orderPizzaButton").setAttribute("disabled", "disabled");
        }
    }

    render() {
        //Conditional rendering
        let correctOrder = true;

        if (this.state.numberOfPizzasTotal === "") {
            correctOrder = false;
        } else if (this.state.sizeOfPizza === "") {
            correctOrder = false;
        } else if (this.state.typeOfPizza === "") {
            correctOrder = false;
        } else if (this.state.storePickup === "") {
            correctOrder = false;
        }

        if (correctOrder) {
            if (1 <= this.state.numberOfPizzasTotal && this.state.numberOfPizzasTotal < 2) {
                this.state.orderTextOutput = this.state.numberOfPizzasTotal + " " + this.state.sizeOfPizza + " " + this.state.typeOfPizza + " Pizza " + " at our " + this.state.storePickup + " store.";
            } else if (2 <= this.state.numberOfPizzasTotal && this.state.numberOfPizzasTotal <= 10) {
                this.state.orderTextOutput = this.state.numberOfPizzasTotal + " " + this.state.sizeOfPizza + " " + this.state.typeOfPizza + " Pizzas " + " at our " + this.state.storePickup + " store.";
            }

            //Determine cost
            let sizeOfPizza = this.state.sizeOfPizza;
            let numberPizzas = this.state.numberOfPizzasTotal;
            let typeOfPizza = this.state.typeOfPizza;
            let baseCost = 0;

            if (sizeOfPizza === "Personal") {
                baseCost = 5;
            } else if (sizeOfPizza === "Small") {
                baseCost = 10;
            } else if (sizeOfPizza === "Medium") {
                baseCost = 11;
            } else if (sizeOfPizza === "Large") {
                baseCost = 12;
            }

            if (sizeOfPizza === "Personal") {
                if (typeOfPizza === "Cheese") {
                    baseCost += 0;
                } else if (typeOfPizza === "Veggie") {
                    baseCost += 0.5;
                } else if (typeOfPizza === "Pepperoni") {
                    baseCost += 0.75;
                } else if (typeOfPizza === "Supreme") {
                    baseCost += 1;
                } else if (typeOfPizza === "Hawaiian") {
                    baseCost += 1;
                }
            } else {
                if (typeOfPizza === "Cheese") {
                    baseCost += 0;
                } else if (typeOfPizza === "Veggie") {
                    baseCost += 2;
                } else if (typeOfPizza === "Pepperoni") {
                    baseCost += 3;
                } else if (typeOfPizza === "Supreme") {
                    baseCost += 4;
                } else if (typeOfPizza === "Hawaiian") {
                    baseCost += 4;
                }
            }
            this.state.orderTotalCost = numberPizzas * baseCost;
        } else {
            this.state.orderTextOutput = "";
        }


        return <div className="order-pizza" onMouseOver={this.checkValidity}>
            <h3 className="order-pizza__header">Order a Pizza!  Pick it up in 30 Minutes!</h3>        
            <div>{this.state.validationFeedbackClientSide}</div>
            <div>
                <form className="form pizza-order" name="pizzaOrder" method="post" action="validate-pizza-order-form.php">       
                    <input type="hidden" id="orderTotalCost" name="orderTotalCost" value={this.state.orderTotalCost} />
                    <div className="form__input-container">
                        <label className="form__label" for="numberOfPizzasTotal">** Number of Pizzas</label>
                        <input id="numberOfPizzasTotal" className="form__input" name="numberOfPizzasTotal" type="text" onChange={this.adjustPizzaOrder} />
                        <div className="clear-both"></div>
                    </div>
                    <div className="form__input-container">
                        <label className="form__label" for="sizeOfPizza">** Size</label>
                        <select id="sizeOfPizza" className="form__input" name="sizeOfPizza" onChange={this.adjustPizzaOrder}>
                            <option value="" label=" "></option>
                            <option value="Personal">Personal: 6"</option>
                            <option value="Small">Small: 12"</option>
                            <option value="Medium">Medium: 15"</option>
                            <option value="Large">Large 18"</option>
                        </select>
                        <div className="clear-both"></div>
                    </div>
                    <div className="form__input-container">
                        <label className="form__label" for="typeOfPizza">** Choose Type of Pizza</label>
                        <select id="typeOfPizza" className="form__input" name="typeOfPizza" onChange={this.adjustPizzaOrder}>
                            <option value="" label=" "></option>
                            <option value="Cheese">Cheese</option>
                            <option value="Veggie">Veggie</option>
                            <option value="Pepperoni">Pepperoni</option>
                            <option value="Supreme">Supreme</option>
                            <option value="Hawaiian">Hawaiian</option>
                        </select>
                        <div className="clear-both"></div>
                    </div>
                    <div className="form__input-container">
                        <label className="form__label" for="storePickup">** Store Pickup</label>
                        <select id="storePickup" className="form__input" name="storePickup" onChange={this.adjustPizzaOrder}>
                            <option value="" label=" "></option>
                            <option value="SE Portland">SE Portland</option>
                            <option value="Happy Valley">Happy Valley</option>
                            <option value="Tigard">Tigard</option>
                            <option value="Milwaukie">Milwaukie</option>
                        </select>
                        <div className="clear-both"></div>
                    </div>
                    <div className="form__input-container">
                        <label className="form__label" for="orderName">** Your Name</label>
                        <input id="orderName" className="form__input" name="orderName" type="text" onChange={this.adjustPizzaOrder} />
                        <div className="clear-both"></div>
                    </div>
                    <div className="form__input-container">
                        <label className="form__label" for="orderEmail">** Your Email</label>
                        <input id="orderEmail" className="form__input" name="orderEmail" type="email" onChange={this.adjustPizzaOrder} />
                        <div className="clear-both"></div>
                    </div>
                    <div className="form__input-container">
                        <label className="form__label" for="orderPhone">** Phone (10 digits, no dashes)</label>
                        <input id="orderPhone" className="form__input" name="orderPhone" type="tel" onChange={this.adjustPizzaOrder} />
                        <div className="clear-both"></div>
                    </div>
                    <div className="form__input-container">
                        <label className="form__label" for="orderComments">Comments</label>
                        <textarea id="orderComments" className="form__input" name="orderComments" onChange={this.adjustPizzaOrder} />
                        <div className="clear-both"></div>
                    </div>
                    <div className="form__input-container button-wrapper"> 
                        <div class="form__explanation-text">** Required</div>
                        <input className="form__submit-button" id="orderPizzaButton" name="orderButton" type="submit" value="Pizza Time!" disabled="disabled" />
                        <div className="clear-both"></div>
                    </div>
                    <div className="form__input-container">
                        <p className="order-summary" >Your Order: {this.state.orderTextOutput}</p>
                        <p className="order-summary" name="orderTotalCost">Total: ${this.state.orderTotalCost}</p>
                        <div className="clear-both"></div>
                    </div>
                    <div class="form__text-container"> 
                        <p>Pay at pick up, cash, debit, or credit gladly accepted.</p>
                        <p>Note: For orders of more than 10 pizzas, please call us at 1-503-999-9999 
                        or <a href="contact-us.php"><strong>use our contact form</strong></a> <strong><em>at least 3 days in advance</em></strong> to ensure timely baking!  Thank you.</p>
                    </div>
                    <div className="clear-both"></div>
                </form>
            </div>
        </div>;
    }
};

const pizzaOrderContent = document.getElementsByClassName('pizza-order-content')[0];

if(pizzaOrderContent){
    ReactDOM.render(<PizzaOrderContent />, pizzaOrderContent);
}

