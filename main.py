import requests as rq
from datetime import datetime
import pandas as pd
import os


class GetDays():

    # Make load to csv
    def load(self, df_content: pd.DataFrame) -> None:
        try:
            if os.path.isfile("./data.csv"):
                os.remove("./data.csv")
            print(df_content)

            df_content.to_csv("data.csv")

        except Exception as e:
            print("Error loading the data" + str(e))

    # Make transform to dataframe
    def transform(self, content: list) -> pd.DataFrame:
        try:
            df_c = pd.DataFrame(content)

        except Exception as e:
            print("Error transforming the data" + str(e))

        return df_c

    # Make extraction from url
    def extract(self) -> list:
        try:
            response = rq.get(self.url)

            content: list = list(response.json())

        except Exception as e:
            print("Error extracting data" + str(e))
            return []

        return list(content)

    def __init__(self,
                 url: str="https://nolaborables.com.ar/api/v2/feriados/" +
                 str(datetime.now().year)) -> None:
        self.url: str = url

def main():
    g_d = GetDays()
    content = g_d.extract()

    df_c = g_d.transform(content)

    g_d.load(df_c)

if __name__ == "__main__":
    main()