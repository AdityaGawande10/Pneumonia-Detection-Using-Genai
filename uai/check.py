import google.generativeai as genai
from PIL import Image
import warnings
import sys
import os
import logging

# Suppress warnings
warnings.filterwarnings("ignore")

# Suppress TensorFlow, absl, and gRPC logs
os.environ["TF_CPP_MIN_LOG_LEVEL"] = "3"  # Suppress TensorFlow warnings
os.environ["GRPC_VERBOSITY"] = "ERROR"    # Suppress gRPC logs
os.environ["GRPC_TRACE"] = "" # Disable gRPC tracing
os.environ["GLOG_minloglevel"] = "3"  # Suppress GLOG logs
os.environ["ABSL_LOG_LEVEL"] = "3"  # Suppress absl logs

# Redirect stderr to suppress remaining logs
sys.stderr = open(os.devnull, "w")
logging.getLogger("tensorflow").setLevel(logging.ERROR)

# Set up Gemini AI with API key
genai.configure(api_key="AIzaSyC0Pz3wxWYljSzIAexqdYMTQyGwdU57NFg")

# Load the chest X-ray image
image_path = "uploads/tt.jpg"
image = Image.open(image_path)

# Initialize Gemini Vision model
model = genai.GenerativeModel("gemini-1.5-flash")

# Perform inference
response = model.generate_content(
    ["This is a chest X-ray image. Determine if the image shows signs of pneumonia or if it is normal.If this is an infected image , can you also suggest some medical advice on it . Also give output without stars or astericks. Also dont include statements like I am an AI and cannot give medical advice. Send the data as of you are a medical expert. Also provide the output in proper format.And do not leave any extra spaces .", image],
    stream=True
)

import re
def replace_multiple_newlines(text: str) -> str:
    # Replace multiple consecutive \n with a single \n
    return re.sub(r'\n+', '\n', text)




# Print the AI response
a = []
for chunk in response:

    a.append(chunk.text)

for x in a:
    result = replace_multiple_newlines(x)
    print(result,end=" ")
    
