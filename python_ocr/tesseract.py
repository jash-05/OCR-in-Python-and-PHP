from PIL import Image
import pytesseract

im=Image.open("example.png")

text=pytesseract.image_to_string(im,lang='eng')

print(text)