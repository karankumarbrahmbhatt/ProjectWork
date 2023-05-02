import pytest
from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from webdriver_manager.chrome import ChromeDriverManager
from selenium.webdriver.support.ui import Select
from selenium.webdriver.common.by import By

import time


driver = webdriver.Chrome(ChromeDriverManager().install())
driver.maximize_window()


def invalidPatientDOBTest():
    ## Testing invalid date of birth input 

    name = "Shrey"
    #INVALID DATE
    dob = "0925201312"

    phone = "2679986"
    address = "123 Main St"
    prescription = "Take one tablet daily"
    print("Testing Invalid Date of Birth for Patient")

    driver.get("http://localhost/group6_pharmacy/patients.html")
    # give the browser time to fully load

    patient_name = driver.find_element("name", "txtName")
    patient_name.send_keys(name)

    patient_dob = driver.find_element("name", "txtDOB")
    patient_dob.send_keys(dob)

    patient_phone = driver.find_element("name", "txtPhone")
    patient_phone.send_keys(phone)

    patient_address = driver.find_element("name", "txtAddress")
    patient_address.send_keys(address)

    patient_prescription = driver.find_element("name", "txtPrescription")
    patient_prescription.send_keys(prescription)
    submit_btn = driver.find_element(By.ID, "Submit")
    submit_btn.click()
    time.sleep(5)
    try: 
        message = driver.find_element(By.ID, "lblPatientAdded").text
        assert message == "Failed to add Patient Record"
        print("Test Successful. Failed to add Patient record")
    except:
        print("Test Unsuccessful.Patient record has been added.")


invalidPatientDOBTest()