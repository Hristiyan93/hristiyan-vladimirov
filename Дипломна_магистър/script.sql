USE [master]
GO

/****** Object:  Database [hypermarket]    Script Date: 1/22/2018 12:02:52 PM ******/
CREATE DATABASE [hypermarket]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'hypermarket', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL11.MSSQLSERVER\MSSQL\DATA\hypermarket.mdf' , SIZE = 5120KB , MAXSIZE = UNLIMITED, FILEGROWTH = 1024KB )
 LOG ON 
( NAME = N'hypermarket_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL11.MSSQLSERVER\MSSQL\DATA\hypermarket_log.ldf' , SIZE = 1024KB , MAXSIZE = 2048GB , FILEGROWTH = 10%)
GO

ALTER DATABASE [hypermarket] SET COMPATIBILITY_LEVEL = 110
GO

IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [hypermarket].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO

ALTER DATABASE [hypermarket] SET ANSI_NULL_DEFAULT OFF 
GO

ALTER DATABASE [hypermarket] SET ANSI_NULLS OFF 
GO

ALTER DATABASE [hypermarket] SET ANSI_PADDING OFF 
GO

ALTER DATABASE [hypermarket] SET ANSI_WARNINGS OFF 
GO

ALTER DATABASE [hypermarket] SET ARITHABORT OFF 
GO

ALTER DATABASE [hypermarket] SET AUTO_CLOSE OFF 
GO

ALTER DATABASE [hypermarket] SET AUTO_CREATE_STATISTICS ON 
GO

ALTER DATABASE [hypermarket] SET AUTO_SHRINK OFF 
GO

ALTER DATABASE [hypermarket] SET AUTO_UPDATE_STATISTICS ON 
GO

ALTER DATABASE [hypermarket] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO

ALTER DATABASE [hypermarket] SET CURSOR_DEFAULT  GLOBAL 
GO

ALTER DATABASE [hypermarket] SET CONCAT_NULL_YIELDS_NULL OFF 
GO

ALTER DATABASE [hypermarket] SET NUMERIC_ROUNDABORT OFF 
GO

ALTER DATABASE [hypermarket] SET QUOTED_IDENTIFIER OFF 
GO

ALTER DATABASE [hypermarket] SET RECURSIVE_TRIGGERS OFF 
GO

ALTER DATABASE [hypermarket] SET  DISABLE_BROKER 
GO

ALTER DATABASE [hypermarket] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO

ALTER DATABASE [hypermarket] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO

ALTER DATABASE [hypermarket] SET TRUSTWORTHY OFF 
GO

ALTER DATABASE [hypermarket] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO

ALTER DATABASE [hypermarket] SET PARAMETERIZATION SIMPLE 
GO

ALTER DATABASE [hypermarket] SET READ_COMMITTED_SNAPSHOT OFF 
GO

ALTER DATABASE [hypermarket] SET HONOR_BROKER_PRIORITY OFF 
GO

ALTER DATABASE [hypermarket] SET RECOVERY FULL 
GO

ALTER DATABASE [hypermarket] SET  MULTI_USER 
GO

ALTER DATABASE [hypermarket] SET PAGE_VERIFY CHECKSUM  
GO

ALTER DATABASE [hypermarket] SET DB_CHAINING OFF 
GO

ALTER DATABASE [hypermarket] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO

ALTER DATABASE [hypermarket] SET TARGET_RECOVERY_TIME = 0 SECONDS 
GO

ALTER DATABASE [hypermarket] SET  READ_WRITE 
GO

