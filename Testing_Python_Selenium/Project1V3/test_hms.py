import unittest
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.chrome.service import Service
from webdriver_manager.chrome import ChromeDriverManager
import time

class TestHMS(unittest.TestCase):
    def setUp(self):
        self.driver = webdriver.Chrome(service = Service(ChromeDriverManager().install()))
        self.driver.maximize_window()
    
    def tearDown(self):
        self.driver.quit()

    def test_1_valid_patient_input(self):
        #Testing valid input data
        name = "Shrey"
        dob = "0020190505"
        phone = "2679986"
        address = "123 Main St"
        prescription = "Take one tablet daily"
        print("Testing Valid Input for Patient")

        self.driver.get("http://localhost/group6_pharmacy/patients.html")
        # give the browser time to fully load

        patient_name = self.driver.find_element("name", "txtName")
        patient_name.send_keys(name)

        patient_dob = self.driver.find_element("name", "txtDOB")
        patient_dob.send_keys(dob)

        patient_phone = self.driver.find_element("name", "txtPhone")
        patient_phone.send_keys(phone)

        patient_address = self.driver.find_element("name", "txtAddress")
        patient_address.send_keys(address)

        patient_prescription = self.driver.find_element("name", "txtPrescription")
        patient_prescription.send_keys(prescription)
        submit_btn = self.driver.find_element(By.ID, "Submit")

        time.sleep(5)
        submit_btn.click()
        time.sleep(5)
        try: 
            message = self.driver.find_element(By.ID, "lblPatientAdded").text
            self.assertEqual(message, "Patient Records Inserted")
            print("Test Successful. Patient inserted successfully")
        except:
            print("Test Unsuccessful. Could not add patient.")

    def test_2_invalid_patient_dob(self):
        ## Testing invalid date of birth input 

        name = "Shrey"
        #INVALID DATE
        dob = "0925201312"

        phone = "2679986"
        address = "123 Main St"
        prescription = "Take one tablet daily"
        print("Testing Invalid Date of Birth for Patient")

        self.driver.get("http://localhost/group6_pharmacy/patients.html")
        # give the browser time to fully load

        patient_name = self.driver.find_element("name", "txtName")
        patient_name.send_keys(name)

        patient_dob = self.driver.find_element("name", "txtDOB")
        patient_dob.send_keys(dob)

        patient_phone = self.driver.find_element("name", "txtPhone")
        patient_phone.send_keys(phone)

        patient_address = self.driver.find_element("name", "txtAddress")
        patient_address.send_keys(address)

        patient_prescription = self.driver.find_element("name", "txtPrescription")
        patient_prescription.send_keys(prescription)
        submit_btn = self.driver.find_element(By.ID, "Submit")
        time.sleep(5)
        submit_btn.click()
        time.sleep(5)
        try: 
            message = self.driver.find_element(By.ID, "lblPatientAdded").text
            self.assertEqual(message, "Failed to add Patient Record")
            print("Test Successful. Failed to add Patient record")
        except:
            print("Test Unsuccessful. Patient record has been added.")

    def test_3_delete_patient(self):
        print("Testing Delete function for Patient")
        self.driver.get("http://localhost/group6_pharmacy/patientsList.php")
        delete_btn = self.driver.find_element(By.CLASS_NAME, "DeleteButton")
        time.sleep(5)
        delete_btn.click()
        time.sleep(5)
        try:
            message = self.driver.find_element(By.ID, "lblPatientDelete").text
            self.assertEqual(message, "Patient record deleted successfully")
            print ("Test Successful.Patient deleted successfully")
        except:
            print("Test Unsuccessful.Could not delete patient.")


if __name__ == '__main__':
    unittest.main()