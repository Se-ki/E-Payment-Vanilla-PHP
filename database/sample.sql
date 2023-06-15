from sqlalchemy import create_engine, Column, Integer, String
from sqlalchemy.orm import sessionmaker
from sqlalchemy.ext.declarative import declarative_base

# Define the database connection
engine = create_engine('your_database_connection_string')
Base = declarative_base()
Session = sessionmaker(bind=engine)
session = Session()

# Define the Customers table
class Customer(Base):
    _tablename_ = 'customers'
    customer_id = Column(Integer, primary_key=True)
    customer_name = Column(String)

# Define the Orders table
class Order(Base):
    _tablename_ = 'orders'
    order_id = Column(Integer, primary_key=True)
    customer_id = Column(Integer)
    order_date = Column(String)

# Create the tables if they don't exist
Base.metadata.create_all(engine)

# Perform an outer join
outer_join_query = session.query(Customer.customer_id, Customer.customer_name, Order.order_id, Order.order_date)\
    .outerjoin(Order, Customer.customer_id == Order.customer_id).all()

# Print the results of the outer join
print("Outer Join Results:")
for row in outer_join_query:
    print(row)

# Perform a left join
left_join_query = session.query(Customer.customer_id, Customer.customer_name, Order.order_id, Order.order_date)\
    .join(Order, Customer.customer_id == Order.customer_id, isouter=True).all()

# Print the results of the left join
print("\nLeft Join Results:")
for row in left_join_query:
    print(row)