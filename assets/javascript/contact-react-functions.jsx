
class ContactFormContent extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            userName: "",
            userEmail: "",
            userSubject: "",
            userComments: ""
        };
    }
    updateUserProvidedInfo = (event) => {
        let nameOfElement = event.target.name;
        let valueProvided = event.target.value;
        this.setState({[nameOfElement]: valueProvided});
    }

    checkValidity = (event) => {
        let validOrder = true;

        if (this.state.userName.length < 1) {
            validOrder = false;
        } else if (this.state.userEmail.length < 6) {
            validOrder = false;
        } else if (this.state.userComments.length < 1) {
            validOrder = false;
        }

        if (validOrder) {
            document.getElementById("contactUsButton").removeAttribute("disabled");
        } else {
            document.getElementById("contactUsButton").setAttribute("disabled", "disabled");
        }
    }

    render() {
        return <div class="content-row">
            <div class="col-sma-12">
                <h3>Write Us!</h3>
                <p>Thank you for writing us <strong>{this.state.userName}</strong> at Mike's Fire-Roasted Pizza.</p>
                <div>** Required</div>
                <form class="form contact-form" name="contactForm" method="post" action="validate-contact-form.php" onMouseOver={this.checkValidity}>
                    <div class="form__input-container">
                        <label class="form__label">** Your Name</label>
                        <input class="form__input" name="userName" type="text" onChange={this.updateUserProvidedInfo} />
                        <div class="clear-both"></div>
                    </div>
                    <div class="form__input-container">
                        <label class="form__label">** Your Email</label>
                        <input class="form__input" name="userEmail" type="email" onChange={this.updateUserProvidedInfo} />
                        <div class="clear-both"></div>
                    </div>
                    <div class="form__input-container">
                        <label class="form__label">Subject</label>
                        <input class="form__input" name="userSubject" type="text" onChange={this.updateUserProvidedInfo} />
                        <div class="clear-both"></div>
                    </div>
                    <div class="form__input-container">
                        <label class="form__label">** Comments</label>
                        <textarea class="form__input" name="userComments" onChange={this.updateUserProvidedInfo} />
                        <div class="clear-both"></div>
                    </div>
                    <div class="form__input-container">
                        <input class="form__submit-button" id="contactUsButton" name="submitButton" type="submit" value="Contact Us!" disabled="disabled" />
                        <div class="clear-both"></div>
                    </div>
                </form>
            </div>
        </div>;
    }
};
ReactDOM.render(<ContactFormContent />, document.getElementsByClassName('contact-form-content')[0]);
