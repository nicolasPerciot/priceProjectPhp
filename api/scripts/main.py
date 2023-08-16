import os
import sys
import pickle
import pandas as pd

sys.path.append(os.path.dirname(os.path.abspath(__file__)))

import conf

def init_target(path) :
      
      global target
      with open(path, 'rb') as target_file :            
            target = pickle.load(target_file)      
            target_file.close()
            
def init_preprocessor(path) :
      
      global preprocessor
      with open(os.path.join(path, 'preprocessor.pkl'), 'rb') as preprocessor_file :            
            preprocessor = pickle.load(preprocessor_file)      
            preprocessor_file.close()
            
def init_model(path) :
      
      global model
      with open(os.path.join(path, 'model.pkl'), 'rb') as model_file :            
            model = pickle.load(model_file)      
            model_file.close()
            
            
            
def data_predict_all(brand, year, kilometers_driven, owner_type, fuel_type, 
          transmission, mileage, engine, power, seats, new_price) :
      
      init_target(conf.path_target)
      init_model(conf.path_data_all)
      init_preprocessor(conf.path_data_all)
      
      data = pd.DataFrame([[brand, year, kilometers_driven, owner_type, fuel_type, 
          transmission, mileage, engine, power, seats, new_price]], columns=conf.columns_model_all)
      data        = preprocessor.transform(data)

      y_pred      = model.predict(data)
      
      return round(target.inverse_transform([y_pred])[0][0], 2)
    
    
def data_predict_lite(brand, year, engine, power, new_price) :

      init_target(conf.path_target)
      init_model(conf.path_data_lite)
      init_preprocessor(conf.path_data_lite)
      
      data        = pd.DataFrame([[brand, year, engine, power, new_price]], columns=conf.columns_model_lite)
      data        = preprocessor.transform(data)
      
      y_pred      = model.predict(data)
      
      return round(target.inverse_transform([y_pred])[0][0], 2)