import cv2
import numpy as np
import pytesseract

pytesseract.pytesseract.tesseract_cmd = r"C:\Program Files\Tesseract-OCR\tesseract.exe"

# Read the image
img1 = cv2.imread('02.jpeg')

# Adding custom options
custom_config = r'--oem 3 --psm 6 -c tessedit_char_whitelist=0123456789'

# Performing OCR on the original color image
text = pytesseract.image_to_string(img1, config=custom_config)

# Printing the OCR result
print(text)

# Display the original image
cv2.imshow('Original Image', img1)
cv2.waitKey(0)
cv2.destroyAllWindows()
