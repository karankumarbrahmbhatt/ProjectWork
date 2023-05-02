const nodemailer = require('nodemailer');

module.exports = async (email, subject, text) => {
	try {
		const transporter = nodemailer.createTransport({
			service: 'gmail',
            auth: {
                user: process.env.GMAIL_USER,
                pass: process.env.GMAIL_PASS
            }
		});

		await transporter.sendMail({
			from: process.env.GMAIL_USER,
			to: email,
			subject: subject,
			text: text,
		});
		console.log("email sent successfully");
	} catch (error) {
		console.log("email not sent!");
		console.log(error);
		return error;
	}
};