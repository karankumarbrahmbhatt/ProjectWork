import pytest
from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from webdriver_manager.chrome import ChromeDriverManager
from selenium.webdriver.support.ui import Select
from selenium.webdriver.common.by import By

import time


driver = webdriver.Chrome(ChromeDriverManager().install())
driver.maximize_window()

def deletePatientTestByID(patientID):
    ## use this test case if you want to delete a specfic ID
    print("Testing Delete function for Patient")

    driver.get("http://localhost/group6_pharmacy/patientsList.php")
    #patientID = 856636

    delete_btn = driver.find_element(By.ID, patientID)
    time.sleep(5)
    delete_btn.click()
    time.sleep(5)

    try:
        message = driver.find_element(By.ID, "lblPatientDelete").text
        assert message == "Patient record deleted successfully"
        print ("Test Successful.Patient deleted successfully")
    except:
        print("Test Unsuccessful.Could not delete patient.")

def deletePatientTest():
    print("Testing Delete function for Patient")

    driver.get("http://localhost/group6_pharmacy/patientsList.php")
    #patientID = 856636

    delete_btn = driver.find_element(By.CLASS_NAME, "DeleteButton")
    delete_btn.click()
    time.sleep(5)

    try:
        message = driver.find_element(By.ID, "lblPatientDelete").text
        assert message == "Patient record deleted successfully"
        print ("Test Successful.Patient deleted successfully")
    except:
        print("Test Unsuccessful.Could not delete patient.")


## use this test case if you want to delete a specfic ID
#deletePatientTestByID(390879)

##use this test case if you want to delete the first record in the table
deletePatientTest()

