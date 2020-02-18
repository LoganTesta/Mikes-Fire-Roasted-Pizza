
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
        
        let atPosition = this.state.userEmail.indexOf("@");
        let dotPosition = this.state.userEmail.lastIndexOf(".");
        let lastEmailCharacter = this.state.userEmail.length - 1;

        if (atPosition <= 0) {
            validOrder = false;
        } else if (atPosition + 1 >= dotPosition) {
            validOrder = false;
        } else if (dotPosition + 1 >= lastEmailCharacter) {
            validOrder = false;
        }
        

        if (validOrder) {
            document.getElementById("contactUsButton").removeAttribute("disabled");
        } else {
            document.getElementById("contactUsButton").setAttribute("disabled", "disabled");
        }
    }

    render() {
        return <div className="content-row">
            <div className="col-sma-12">
                <div class="content__text">
                    <h3>Write Us!</h3>
                    <p>Thank you for writing us <strong>{this.state.userName}</strong> at Mike's Fire-Roasted Pizza.</p>
                </div>
                <div>** Required</div>
                <form className="form contact-form" name="contactForm" method="post" action="validate-contact-form.php" onMouseOver={this.checkValidity}>
                    <div className="form__input-container">
                        <label className="form__label">** Your Name</label>
                        <input className="form__input" name="userName" type="text" onChange={this.updateUserProvidedInfo} />
                        <div className="clear-both"></div>
                    </div>
                    <div className="form__input-container">
                        <label className="form__label">** Your Email</label>
                        <input className="form__input" name="userEmail" type="email" onChange={this.updateUserProvidedInfo} />
                        <div className="clear-both"></div>
                    </div>
                    <div className="form__input-container">
                        <label className="form__label">Subject</label>
                        <input className="form__input" name="userSubject" type="text" onChange={this.updateUserProvidedInfo} />
                        <div className="clear-both"></div>
                    </div>
                    <div className="form__input-container">
                        <label className="form__label">** Comments</label>
                        <textarea className="form__input" name="userComments" onChange={this.updateUserProvidedInfo} />
                        <div className="clear-both"></div>
                    </div>
                    <div className="form__input-container">
                        <input className="form__submit-button" id="contactUsButton" name="submitButton" type="submit" value="Contact Us!" disabled="disabled" />
                        <div className="clear-both"></div>
                    </div>
                </form>
            </div>
        </div>;
    }
};
const contactFormContent = document.getElementsByClassName('contact-form-content')[0];

if(contactFormContent){
    ReactDOM.render(<ContactFormContent />, contactFormContent);
}

